<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - ParentCamp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 font-sans antialiased py-16">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100 text-center">
        <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-green-100 text-green-600 rounded-full text-2xl">
            ✓
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Registrasi Berhasil!</h1>
        <p class="text-sm text-gray-500 mt-1">Terima kasih telah mendaftar dalam event ParentCamp.</p>

        <div class="my-6 p-4 bg-indigo-50 border border-indigo-100 rounded-lg">
            <span class="block text-xs uppercase tracking-wider text-indigo-500 font-semibold">Kode Unik Kehadiran Anda</span>
            <span class="text-3xl font-ext5ibold text-indigo-700 tracking-widest mt-1 block">{{ $registrasi->kode_unik }}</span>
            <p class="text-xs text-gray-500 mt-2">Harap simpan kode ini atau tunjukkan saat melakukan check-in di lokasi acara.</p>
        </div>

        <div class="text-left text-sm text-gray-600 space-y-2 border-t border-gray-100 pt-4 mb-6">
            <div class="flex justify-between">
                <span class="font-medium">Orang Tua:</span>
                <span>{{ $registrasi->nama_orang_tua }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Santri:</span>
                <span>{{ $registrasi->nama_santri }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Paket:</span>
                <span>{{ $registrasi->paket->nama_paket ?? '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Total Biaya:</span>
                <span class="font-bold text-gray-800">Rp {{ number_format($registrasi->total_bayar, 0, ',', '.') }}</span>
            </div>
        </div>

        <a href="{{ route('registrasi.create') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-lg transition duration-200 text-sm">
            Kembali / Buat Pendaftaran Lain
        </a>
    </div>
</body>
</html>