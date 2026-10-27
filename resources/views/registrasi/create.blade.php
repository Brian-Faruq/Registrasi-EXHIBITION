<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran ParentCamp - Sekolah Impian</title>
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

    <div class="max-w-xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/20 p-8 sm:p-10">
        
        <!-- HEADER & LOGO -->
        <div class="text-center mb-8 border-b border-gray-100 pb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-bgLight rounded-2xl shadow-md mb-4 text-tealPrimary text-2xl border border-tealPrimary/10">
                <i class="fa-solid fa-school"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-navyAccent tracking-tight">Formulir Pendaftaran ParentCamp</h1>
            <p class="text-xs font-semibold text-tealDark uppercase tracking-wider mt-1">Sekolah Impian • Silakan isi data dengan benar</p>
        </div>

        <!-- ALERT ERROR -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-2xl text-xs space-y-1">
                <div class="font-bold flex items-center">
                    <i class="fa-solid fa-circle-exclamation mr-1.5 text-red-500 text-sm"></i> Terjadi kesalahan pengisian:
                </div>
                <ul class="list-disc list-inside pl-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM PENDAFTARAN -->
        <form action="{{ route('registrasi.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Orang Tua -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Nama Orang Tua</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                        <i class="fa-solid fa-user-tie"></i>
                    </span>
                    <input type="text" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}" required placeholder="Nama lengkap orang tua"
                        class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition">
                </div>
            </div>

            <!-- Nama Santri (Anak) -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Nama Santri (Anak)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                        <i class="fa-solid fa-child"></i>
                    </span>
                    <input type="text" name="nama_santri" value="{{ old('nama_santri') }}" required placeholder="Nama lengkap anak / santri"
                        class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition">
                </div>
            </div>

            <!-- Nomor WhatsApp Aktif -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Nomor WhatsApp Aktif</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                        <i class="fa-brands fa-whatsapp text-emerald-600"></i>
                    </span>
                    <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp') }}" placeholder="08xxxxxxxxxx" required
                        class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition">
                </div>
            </div>

            <!-- Pilihan Paket Kegiatan -->
            <div>
                <label for="paket_id" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">
                    Pilih Paket Kegiatan <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm pointer-events-none">
                        <i class="fa-solid fa-ticket"></i>
                    </span>
                    <select name="paket_id" id="paket_id" required 
                            class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition appearance-none">
                        <option value="">-- Pilih Paket Kegiatan --</option>
                        @foreach($pakets as $paket)
                            <option value="{{ $paket->id }}" {{ old('paket_id') == $paket->id ? 'selected' : '' }}>
                                {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 text-xs pointer-events-none">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
                @error('paket_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total Anggota yang Hadir -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Total Anggota yang Hadir</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <input type="number" name="total_anggota" min="1" value="{{ old('total_anggota', 1) }}" required
                        class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition">
                </div>
            </div>

            <!-- Rincian Nama Anggota yang Hadir -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Rincian Nama Anggota yang Hadir</label>
                <textarea name="rincian_anggota" rows="3" placeholder="Contoh: Ayah (Budi), Ibu (Siti)" required
                    class="w-full p-4 bg-bgLight border border-gray-200 rounded-xl focus:ring-2 focus:ring-tealPrimary focus:outline-none text-sm text-navyAccent transition">{{ old('rincian_anggota') }}</textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent font-extrabold py-4 rounded-xl shadow-lg hover:shadow-orangeGold/30 transition transform hover:-translate-y-0.5">
                <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pendaftaran & Generate Kode Unik
            </button>
        </form>

        <!-- Footer Kembali -->
        <div class="mt-8 text-center border-t border-gray-100 pt-5">
            <a href="{{ route('dashboard') }}" class="text-xs text-gray-500 hover:text-tealPrimary font-semibold transition inline-flex items-center">
                <i class="fa-solid fa-arrow-left mr-1.5"></i> Kembali ke Dashboard
            </a>
        </div>

    </div>

</body>
</html>