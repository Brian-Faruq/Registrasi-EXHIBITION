<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliSantri;
use App\Models\Kamar;
use App\Models\Bed;
use App\Models\Registrasi;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    // Menampilkan halaman form registrasi dan daftar kamar/bed
    public function index()
    {
        $kamars = Kamar::with('beds')->get();
        return view('registrasi.index', compact('kamars'));
    }

    // Menyimpan data registrasi dan memperbarui status bed
    public function store(Request $request)
    {
        $request->validate([
            'nama_wali' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
            'nama_santri' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'opsi_menginap' => 'required|in:ya,tidak',
            'bed_id' => 'required_if:opsi_menginap,ya|nullable|exists:beds,id',
        ]);

        DB::transaction(function () use ($request, &$registrasi) {
            // 1. Simpan Data Wali Santri
            $wali = WaliSantri::create([
                'nama_wali' => $request->nama_wali,
                'no_whatsapp' => $request->no_whatsapp,
                'nama_santri' => $request->nama_santri,
                'kelas' => $request->kelas,
            ]);

            // 2. Jika menginap, update status bed menjadi 'booked'
            $bedId = null;
            if ($request->opsi_menginap === 'ya') {
                $bedId = $request->bed_id;
                $bed = Bed::findOrFail($bedId);
                $bed->update(['status' => 'booked']);
            }

            // 3. Simpan Data Registrasi
            $registrasi = Registrasi::create([
                'wali_id' => $wali->id,
                'bed_id' => $bedId,
                'opsi_menginap' => $request->opsi_menginap,
                'tgl_registrasi' => now(),
            ]);
        });

        return redirect()->route('registrasi.tiket', $registrasi->id);
    }

    // Menampilkan halaman tiket / bukti registrasi
    public function tiket($id)
    {
        $registrasi = Registrasi::with(['waliSantri', 'bed.kamar'])->findOrFail($id);
        return view('registrasi.tiket', compact('registrasi'));
    }
}