@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-slate-200">
        <div class="bg-emerald-600 p-6 text-center text-white">
            <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 101-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h2 class="text-2xl font-bold">Registrasi Berhasil!</h2>
            <p class="text-emerald-100 text-sm">Simpan bukti pendaftaran ini.</p>
        </div>

        <div class="p-6 space-y-4">
            <div class="border-b pb-3">
                <span class="text-xs text-slate-400 uppercase font-semibold">Nama Wali Santri</span>
                <p class="text-lg font-bold text-slate-800">{{ $registrasi->waliSantri->nama_wali }}</p>
            </div>

            <div class="border-b pb-3">
                <span class="text-xs text-slate-400 uppercase font-semibold">Nama Santri & Kelas</span>
                <p class="text-base font-semibold text-slate-800">{{ $registrasi->waliSantri->nama_santri }} ({{ $registrasi->waliSantri->kelas }})</p>
            </div>

            <div class="border-b pb-3">
                <span class="text-xs text-slate-400 uppercase font-semibold">Status Menginap</span>
                <p class="text-base font-semibold text-indigo-600">{{ strtoupper($registrasi->opsi_menginap) }}</p>
            </div>

            @if($registrasi->opsi_menginap === 'ya' && $registrasi->bed)
            <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                <span class="text-xs text-indigo-500 uppercase font-bold">Alokasi Tempat Tidur</span>
                <p class="text-lg font-bold text-indigo-900">{{ $registrasi->bed->kamar->nama_gedung }}</p>
                <p class="text-sm font-medium text-indigo-700">Kamar {{ $registrasi->bed->kamar->nomor_kamar }} - Bed Nomor {{ $registrasi->bed->nomor_bed }}</p>
            </div>
            @endif

            <div class="pt-4 text-center">
                <button onclick="window.print()" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-medium py-2 px-4 rounded-lg transition">
                    Cetak Tiket / Simpan PDF
                </button>
            </div>
        </div>
    </div>
</div>
@endsection