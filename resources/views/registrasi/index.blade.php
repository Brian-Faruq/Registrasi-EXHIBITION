@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4" x-data="{ menginap: 'ya', selectedBed: null }">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
        <div class="bg-indigo-600 px-6 py-4 text-white">
            <h2 class="text-lg font-semibold">Formulir Pendaftaran & Penginapan</h2>
            <p class="text-indigo-100 text-sm">Silakan isi data wali santri dan pilih tempat tidur jika menginap.</p>
        </div>

        <form action="{{ route('registrasi.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Form Data Wali & Santri -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Wali Santri</label>
                    <input type="text" name="nama_wali" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Masukkan nama wali">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" name="no_whatsapp" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="08xxxxxxxxxx">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Santri</label>
                    <input type="text" name="nama_santri" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Masukkan nama santri">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Kelas / Jilid</label>
                    <input type="text" name="kelas" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Contoh: 10 IPA 1 / Jilid 2">
                </div>
            </div>

            <hr class="border-slate-200">

            <!-- Opsi Menginap -->
            <div>
                <label class="block text-sm font-semibold text-slate-800 mb-2">Apakah Anda Akan Menginap?</label>
                <div class="flex space-x-6">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="opsi_menginap" value="ya" x-model="menginap" class="text-indigo-600 focus:ring-indigo-500">
                        <span class="text-slate-700 font-medium">Ya, Saya Menginap</span>
                    </label>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="opsi_menginap" value="tidak" x-model="menginap" class="text-indigo-600 focus:ring-indigo-500">
                        <span class="text-slate-700 font-medium">Tidak Menginap</span>
                    </label>
                </div>
            </div>

            <!-- Visualisasi Denah Bed (Hanya Tampil Jika Pilih 'Ya') -->
            <div x-show="menginap === 'ya'" x-transition class="space-y-4">
                <h3 class="text-md font-semibold text-slate-800">Pilih Tempat Tidur (Bed)</h3>
                <p class="text-xs text-slate-500 mb-2">* Klik pada nomor bed yang berwarna hijau (Tersedia) untuk memilih.</p>

                <input type="hidden" name="bed_id" :value="selectedBed">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($kamars as $kamar)
                        <div class="border rounded-lg p-4 bg-slate-50">
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-bold text-indigo-900">{{ $kamar->nama_gedung }}</span>
                                <span class="text-xs bg-indigo-100 text-indigo-700 font-semibold px-2 py-1 rounded">Kamar {{ $kamar->nomor_kamar }}</span>
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                @foreach($kamar->beds as $bed)
                                    @if($bed->status === 'available')
                                        <button type="button" 
                                            @click="selectedBed = {{ $bed->id }}" 
                                            :class="selectedBed === {{ $bed->id }} ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-emerald-100 text-emerald-800 border-emerald-300 hover:bg-emerald-200'"
                                            class="border py-2 rounded-md font-medium text-sm transition text-center">
                                            Bed {{ $bed->nomor_bed }}
                                        </button>
                                    @else
                                        <button type="button" disabled class="bg-rose-100 text-rose-400 border border-rose-200 py-2 rounded-md font-medium text-sm text-center cursor-not-allowed">
                                            Terisi
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                    Konfirmasi & Dapatkan Tiket
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
