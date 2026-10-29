<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket ParentCamp - {{ $registrasi->kode_unik }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen p-6 flex flex-col items-center justify-center">

    <!-- Tombol Aksi Cetak -->
    <div class="no-print mb-6 space-x-3">
        <button onclick="window.print()" class="bg-blue-600 text-white font-bold px-5 py-2.5 rounded-xl shadow hover:bg-blue-700 text-sm">
            <i class="fa-solid fa-print mr-2"></i> Cetak Sekarang
        </button>
        <button onclick="window.close()" class="bg-gray-200 text-gray-700 font-bold px-4 py-2.5 rounded-xl hover:bg-gray-300 text-sm">
            Tutup
        </button>
    </div>

    <!-- Tampilan Tiket Fisik untuk Di-print -->
    <div class="max-w-xl w-full bg-white border-2 border-dashed border-gray-300 p-8 rounded-3xl shadow-lg relative">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <div>
                <h1 class="text-xl font-extrabold text-gray-800">PARENTCAMP EXHIBITION 2026</h1>
                <p class="text-xs text-teal-600 font-bold">Sekolah Impian</p>
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-400 block">KODE TIKET</span>
                <span class="text-lg font-mono font-bold text-indigo-600">{{ $registrasi->kode_unik }}</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-xs mb-6">
            <div>
                <p class="text-gray-400">Nama Orang Tua</p>
                <p class="font-bold text-gray-800 text-sm">{{ $registrasi->nama_orang_tua }}</p>
            </div>
            <div>
                <p class="text-gray-400">Nama Santri</p>
                <p class="font-bold text-gray-800 text-sm">{{ $registrasi->nama_santri }}</p>
            </div>
            <div>
                <p class="text-gray-400">Paket Kegiatan</p>
                <p class="font-bold text-gray-800 text-sm">{{ $registrasi->paket->nama_paket ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-400">Total Anggota Hadir</p>
                <p class="font-bold text-gray-800 text-sm">{{ $registrasi->total_anggota }} Orang</p>
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-xl text-center border">
            <p class="text-[11px] text-gray-500 mb-1">Tunjukkan tiket ini kepada petugas check-in di lokasi acara.</p>
            <p class="text-xs font-bold text-gray-700">Grand Ballroom Convention Center • 14 - 15 November 2026</p>
        </div>
    </div>

</body>
</html>