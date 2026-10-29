<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - Sekolah Impian ParentCamp</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tealPrimary: '#00A896',
                        tealDark: '#028090',
                        orangeGold: '#F4A261',
                        orangeHover: '#E76F51',
                        navyAccent: '#1D3557',
                        bgLight: '#F8FAF9',
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-navyAccent via-tealDark to-tealPrimary min-h-screen py-12 px-4 sm:px-6 flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/20 p-8 sm:p-10 text-center">
        
        <!-- Ikon Sukses -->
        <div class="mb-5 inline-flex items-center justify-center w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl shadow-inner text-2xl border border-emerald-100 animate-bounce">
            <i class="fa-solid fa-check"></i>
        </div>

        <h1 class="text-2xl font-extrabold text-navyAccent tracking-tight">Registrasi Berhasil!</h1>
        <p class="text-xs text-gray-500 mt-1">Terima kasih telah mendaftar dalam event ParentCamp Sekolah Impian.</p>

        <!-- Kotak Kode Unik -->
        <div class="my-6 p-5 bg-bgLight border border-tealPrimary/20 rounded-2xl shadow-sm">
            <span class="block text-[11px] uppercase tracking-wider text-tealDark font-extrabold mb-1">
                <i class="fa-solid fa-ticket mr-1"></i> Kode Unik Kehadiran Anda
            </span>
            <span class="text-3xl font-extrabold text-navyAccent tracking-wider block my-2 font-mono bg-white py-2 rounded-xl border border-gray-100 shadow-sm">
                {{ $registrasi->kode_unik }}
            </span>
            <p class="text-[11px] text-gray-400 mt-2">Harap simpan kode ini atau tunjukkan saat melakukan check-in di lokasi acara.</p>
        </div>

        <!-- Rincian Data Peserta -->
        <div class="text-left text-xs text-gray-600 space-y-2.5 border-t border-gray-100 pt-5 mb-6">
            <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl">
                <span class="font-bold text-gray-500 uppercase tracking-wider text-[10px]">Orang Tua:</span>
                <span class="font-semibold text-navyAccent">{{ $registrasi->nama_orang_tua }}</span>
            </div>
            <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl">
                <span class="font-bold text-gray-500 uppercase tracking-wider text-[10px]">Santri:</span>
                <span class="font-semibold text-navyAccent">{{ $registrasi->nama_santri }}</span>
            </div>
            <div class="flex justify-between items-center bg-gray-50 p-2.5 rounded-xl">
                <span class="font-bold text-gray-500 uppercase tracking-wider text-[10px]">Paket:</span>
                <span class="font-semibold text-tealDark">{{ $registrasi->paket->nama_paket ?? '-' }}</span>
            </div>
            <div class="flex justify-between items-center bg-teal-50/50 p-3 rounded-xl border border-teal-100">
                <span class="font-bold text-tealDark uppercase tracking-wider text-[10px]">Total Biaya:</span>
                <span class="font-extrabold text-tealPrimary text-sm">Rp {{ number_format($registrasi->total_bayar, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="space-y-2.5">
            <a href="{{ route('dashboard') }}" class="block w-full bg-gradient-to-r from-tealPrimary to-tealDark hover:opacity-90 text-white font-extrabold py-3.5 rounded-xl shadow-md transition transform hover:-translate-y-0.5 text-xs">
                <i class="fa-solid fa-house mr-1.5"></i> Kembali ke Dashboard
            </a>
            <a href="{{ route('registrasi.create') }}" class="block w-full bg-bgLight hover:bg-gray-100 text-gray-600 font-bold py-3 rounded-xl transition text-xs border border-gray-200">
                <i class="fa-solid fa-plus mr-1.5"></i> Buat Pendaftaran Lain
            </a>
        </div>

    </div>

</body>
</html>