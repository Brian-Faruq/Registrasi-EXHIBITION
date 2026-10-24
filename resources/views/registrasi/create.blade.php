<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi ParentCamp</title>
    <!-- Menggunakan Tailwind CSS untuk styling cepat -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 font-sans antialiased py-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Formulir Pendaftaran ParentCamp</h1>
            <p class="text-sm text-gray-500 mt-1">Sekolah Impian - Silakan isi data dengan benar</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registrasi.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Orang Tua</label>
                <input type="text" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Santri (Anak)</label>
                <input type="text" name="nama_santri" value="{{ old('nama_santri') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp') }}" placeholder="08xxxxxxxxxx" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
<!-- Pilihan Paket Kegiatan (Kamar Dihapus) -->
<div class="mb-4">
    <label for="paket_id" class="block text-sm font-medium text-gray-700 mb-1">
        Pilih Paket Kegiatan <span class="text-red-500">*</span>
    </label>
    <select name="paket_id" id="paket_id" required 
            class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">-- Pilih Paket Kegiatan --</option>
        @foreach($pakets as $paket)
            <option value="{{ $paket->id }}" {{ old('paket_id') == $paket->id ? 'selected' : '' }}>
                {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga, 0, ',', '.') }}
            </option>
        @endforeach
    </select>
    @error('paket_id')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Total Anggota yang Hadir</label>
                <input type="number" name="total_anggota" min="1" value="1" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rincian Nama Anggota yang Hadir</label>
                <textarea name="rincian_anggota" rows="3" placeholder="Contoh: Ayah (Budi), Ibu (Siti)" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">{{ old('rincian_anggota') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Kirim Pendaftaran & Generate Kode Unik
            </button>
        </form>
    </div>
</body>
</html>