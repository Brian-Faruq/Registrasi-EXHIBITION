<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    // Menampilkan Form Registrasi
    public function create()
    {
        $pakets = Paket::all(); // Mengambil data dari tabel pakets
        return view('registrasi.create', compact('pakets'));
    }

    // Menyimpan Data Pendaftaran & Generate Kode Unik
    public function store(Request $request)
    {
        // 1. Validasi input form (Pastikan tidak ada karakter angka acak di awal baris)
        $request->validate([
            'nama_orang_tua' => 'required|string|max:255',
            'nama_santri' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
            'paket_id' => 'required|exists:pakets,id',
            'total_anggota' => 'required|integer|min:1',
            'rincian_anggota' => 'required|string',
        ]);

        // 2. Ambil data paket untuk menghitung total biaya
        $paket = Paket::findOrFail($request->paket_id);
        $totalBayar = $paket->harga * $request->total_anggota;

        // 3. Generate Kode Unik Internal
        $kodeUnik = 'PC-' . strtoupper(Str::random(6));

        // 4. Simpan Data Registrasi ke Database Lokal
        $registrasi = Registrasi::create([
            'user_id' => Auth::id() ?? null,
            'paket_id' => $request->paket_id,
            'kode_unik' => $kodeUnik,
            'nama_orang_tua' => $request->nama_orang_tua,
            'nama_santri' => $request->nama_santri,
            'no_whatsapp' => $request->no_whatsapp,
            'total_anggota' => $request->total_anggota,
            'rincian_anggota' => $request->rincian_anggota,
            'total_bayar' => $totalBayar,
            'status_pembayaran' => 'pending',
            'status_checkin' => 'belum',
        ]);

        // 5. Konfigurasi Data untuk Request ke API TriPay Sandbox
        $merchantCode = env('TRIPAY_MERCHANT_CODE');
        $apiKey       = env('TRIPAY_API_KEY');
        $privateKey   = env('TRIPAY_PRIVATE_KEY');

        $merchantRef  = $kodeUnik;
        $amount       = $totalBayar;

        // Signature diperlukan oleh TriPay untuk keamanan
        $signature    = hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey);

        $data = [
            'method'         => 'QRIS', // Default metode pembayaran QRIS
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => $request->nama_orang_tua,
            'customer_email' => Auth::user()->email ?? 'wali.santri@example.com',
            'customer_phone' => $request->no_whatsapp,
            'order_items'    => [
                [
                    'name'     => $paket->nama_paket,
                    'price'    => $paket->harga,
                    'quantity' => $request->total_anggota,
                ]
            ],
            'return_url'     => route('registrasi.sukses', $registrasi->id),
            'expired_time'   => (time() + (24 * 60 * 60)), // Berlaku 24 jam
            'signature'      => $signature
        ];

        // 6. Kirim Request menggunakan HTTP Client Laravel ke TriPay Sandbox
        $response = Http::withToken($apiKey)->post('https://tripay.co.id/api-sandbox/transaction/create', $data);

        if ($response->successful() && $response->json('success')) {
            $tripayData = $response->json('data');

            // Simpan referensi dan URL pembayaran dari TriPay ke database
            $registrasi->update([
                'reference'      => $tripayData['reference'],
                'checkout_url'   => $tripayData['checkout_url'],
                'payment_method' => $tripayData['payment_method'],
            ]);

            // Arahkan pengguna langsung ke halaman pembayaran resmi TriPay
            return redirect($tripayData['checkout_url']);
        }

        // Jika gagal terhubung ke TriPay, arahkan ke halaman sukses dengan catatan
        return redirect()->route('registrasi.sukses', $registrasi->id);
    }

    // Halaman Sukses Pendaftaran
    public function sukses($id)
    {
        $registrasi = Registrasi::with('paket')->findOrFail($id);
        return view('registrasi.sukses', compact('registrasi'));
    }

    // Fitur Cetak Tiket Fisik
    public function cetakTiket($id)
    {
        $registrasi = Registrasi::where('user_id', Auth::id())->with('paket')->findOrFail($id);
        return view('registrasi.cetak_tiket', compact('registrasi'));
    }

    // Callback dari TriPay saat pembayaran sukses
    public function callback(Request $request)
    {
        $privateKey = env('TRIPAY_PRIVATE_KEY');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $privateKey);

        if ($request->header('X-Callback-Signature') !== $signature) {
            return response()->json(['success' => false, 'message' => 'Invalid signature'], 400);
        }

        if ($request->header('X-Callback-Event') === 'payment_status') {
            $data = json_decode($json);

            if ($data->status === 'PAID') {
                $registrasi = Registrasi::where('reference', $data->reference)->first();
                if ($registrasi) {
                    $registrasi->update([
                        'status_pembayaran' => 'lunas'
                    ]);
                }
            }
        }

        return response()->json(['success' => true]);
    }
}