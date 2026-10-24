<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - ParentCamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-indigo-600 p-6 text-center text-white">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-500 rounded-full mb-3 shadow-inner">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold">Pendaftaran Berhasil!</h1>
            <p class="text-indigo-200 text-sm mt-1">Terima kasih telah mendaftar di ParentCamp</p>
        </div>

        <div class="p-6 space-y-6">
            <!-- Alert jika ada pesan error dari TriPay -->
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Banner Kode Unik -->
            <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 text-center">
                <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600">Kode Unik Registrasi</span>
                <div class="text-3xl font-extrabold text-indigo-900 tracking-widest my-1">
                    {{ $registrasi->kode_unik }}
                </div>
                <p class="text-xs text-gray-500">Simpan kode ini untuk keperluan check-in saat acara berlangsung.</p>
            </div>

            <!-- Detail Pendaftaran -->
            <div class="border-t border-b border-gray-100 py-4 space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Nama Orang Tua</span>
                    <span class="font-medium text-gray-800">{{ $registrasi->nama_orang_tua }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Nama Santri</span>
                    <span class="font-medium text-gray-800">{{ $registrasi->nama_santri }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Paket Kegiatan</span>
                    <span class="font-medium text-gray-800">{{ $registrasi->paket->nama_paket ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Kamar</span>
                    <span class="font-medium text-gray-800">{{ $registrasi->kamar->nama_kamar ?? 'Non-Menginap' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Total Tagihan</span>
                    <span class="font-bold text-indigo-600">Rp {{ number_format($registrasi->total_bayar, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center pt-2">
                    <span class="text-gray-500">Status Pembayaran</span>
                    @if($registrasi->status_pembayaran == 'lunas')
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">LUNAS</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">PENDING</span>
                    @endif
                </div>
            </div>

            <!-- Tombol Aksi Pembayaran TriPay -->
            <div class="space-y-3">
                @if($registrasi->checkout_url && $registrasi->status_pembayaran != 'lunas')
                    <a href="{{ $registrasi->checkout_url }}" target="_blank" 
                       class="block w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-center py-3 rounded-xl shadow-lg transition duration-200">
                        Bayar Sekarang via TriPay ➔
                    </a>
                @endif

                <a href="{{ url('/registrasi') }}" 
                   class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-center py-3 rounded-xl transition duration-200 text-sm">
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>
</body>
</html>