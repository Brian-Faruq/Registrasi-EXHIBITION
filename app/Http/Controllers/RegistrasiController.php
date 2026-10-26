<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Ticket;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    // 1. Menampilkan Halaman Form Pendaftaran
    public function index()
    {
        // Mengambil daftar tiket yang aktif/tersedia dari database
        $tickets = Ticket::all(); 
        return view('exhibition.register', compact('tickets'));
    }

    // 2. Memproses Pendaftaran & Integrasi TriPay
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'full_name'      => 'required|string|max:150',
            'email'          => 'required|email|max:150',
            'whatsapp'       => 'required|string|max:20',
            'ticket_id'      => 'required|exists:tickets,id',
            'payment_method' => 'required|string', // Contoh: QRIS, BRIVA, BCAVA
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        
        // Buat Kode Referensi Unik (Invoice)
        $merchantRef = 'INV-' . time() . rand(100, 999);

        // Data transaksi untuk dikirimkan ke TriPay
        $apiKey       = config('services.tripay.api_key');
        $privateKey   = config('services.tripay.private_key');
        $merchantCode = config('services.tripay.merchant_code');
        $amount       = $ticket->price;

        // Formula Signature TriPay: HMAC-SHA256(merchant_code + merchant_ref + amount, private_key)
        $signature = hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey);

        $payload = [
            'method'         => $request->payment_method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => $request->full_name,
            'customer_email' => $request->email,
            'customer_phone' => $request->whatsapp,
            'order_items'    => [
                [
                    'name'     => $ticket->name,
                    'price'    => $ticket->price,
                    'quantity' => 1,
                ]
            ],
            'return_url'   => route('registration.success', ['ref' => $merchantRef]),
            'expired_time' => (time() + (24 * 60 * 60)), // Expired dalam 24 jam
            'signature'    => $signature,
        ];

        // Request ke API TriPay (Gunakan mode Sandbox / Production sesuai kebutuhan)
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post('https://tripay.co.id/api-sandbox/transaction/create', $payload);

        $result = $response->json();

        if ($response->successful() && isset($result['success']) && $result['success']) {
            $tripayData = $result['data'];

            // Simpan data pendaftaran ke database MySQL
            $registration = Registration::create([
                'reference_code' => $merchantRef,
                'ticket_id'      => $ticket->id,
                'full_name'      => $request->full_name,
                'email'          => $request->email,
                'whatsapp'       => $request->whatsapp,
                'payment_method' => $request->payment_method,
                'amount'         => $amount,
                'checkout_url'   => $tripayData['checkout_url'] ?? null,
                'qr_url'         => $tripayData['qr_url'] ?? null,
                'pay_code'       => $tripayData['pay_code'] ?? null,
                'status'         => 'UNPAID',
            ]);

            // Direct ke halaman instruksi pembayaran
            return redirect()->route('registration.checkout', ['reference' => $merchantRef]);
        }

        return back()->with('error', 'Gagal memproses pembayaran TriPay: ' . ($result['message'] ?? 'Terjadi kesalahan.'));
    }

    // 3. Menampilkan Halaman Checkout / Instruksi Pembayaran
    public function checkout($reference)
    {
        $registration = Registration::where('reference_code', $reference)->firstOrFail();
        return view('exhibition.checkout', compact('registration'));
    }

    // 4. Callback dari TriPay (Webhook otomatis saat pembayaran LUNAS)
    public function handleCallback(Request $request)
    {
        $privateKey = config('services.tripay.private_key');
        $callbackSignature = $request->header('X-Callback-Signature');
        $json = $request->getContent();

        // Validasi Signature Callback TriPay
        $signature = hash_hmac('sha256', $json, $privateKey);

        if ($credentials = $callbackSignature !== $signature) {
            return response()->json(['success' => false, 'message' => 'Invalid signature'], 400);
        }

        $data = json_decode($json, true);

        if ($data['status'] === 'PAID') {
            $registration = Registration::where('reference_code', $data['merchant_ref'])->first();
            if ($registration) {
                $registration->update(['status' => 'PAID']);
            }
        }

        return response()->json(['success' => true]);
    }
}