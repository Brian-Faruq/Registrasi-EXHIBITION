<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta - ParentCamp Exhibition 2026</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-bgLight text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- NAVBAR DASHBOARD -->
    <nav class="bg-gradient-to-r from-navyAccent via-tealDark to-tealPrimary text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand Logo -->
                <a href="{{ route('exhibition.landing') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-white rounded-xl flex items-center justify-center text-tealPrimary font-bold text-lg shadow">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <span class="font-bold text-lg tracking-tight">ParentCamp <span class="text-orangeGold">Dashboard</span></span>
                </a>

                <!-- User & Logout -->
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium hidden sm:inline-block">
                        <i class="fa-solid fa-user-circle mr-1 text-orangeGold"></i> {{ Auth::user()->name ?? 'Peserta' }}
                    </span>
                    <!-- Bagian Tombol Logout di Navbar Dashboard -->
<form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari akun?');">
    @csrf
    <button type="submit" class="bg-red-500/80 hover:bg-red-600 text-white text-xs font-bold px-3 py-2 rounded-lg transition">
        <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
    </button>
</form>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT DASHBOARD -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full">
        
        <!-- WELCOME BANNER -->
        <div class="bg-gradient-to-r from-navyAccent to-tealDark text-white p-8 rounded-3xl shadow-xl mb-8 relative overflow-hidden">
            <div class="relative z-10 max-w-2xl">
                <span class="bg-orangeGold/20 text-orangeGold border border-orangeGold/30 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3 inline-block">
                    Selamat Datang 
                </span>
                <h1 class="text-3xl font-extrabold mb-2">Halo, {{ Auth::user()->name ?? 'Peserta ParentCamp' }}!</h1>
                <p class="text-teal-100 text-sm leading-relaxed">
                    Pantau status pendaftaran tiket Exhibition Anda atau lakukan pembelian tiket acara Sekolah Impian melalui panel dashboard ini.
                </p>
            </div>
        </div>

        <!-- STATUS TIKET PESERTA -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KARTU STATUS PENDAFTARAN -->
            <div class="lg:col-span-2 bg-white p-8 rounded-3xl shadow-md border border-gray-100">
                <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-xl font-bold text-navyAccent">Status Tiket Exhibition Anda</h3>
                    <span class="text-xs bg-amber-100 text-amber-700 font-bold px-3 py-1 rounded-full">Belum Memiliki Tiket</span>
                </div>

                <!-- JIKA BELUM MEMBELI TIKET -->
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-orangeGold/10 text-orangeHover rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    <h4 class="text-lg font-bold text-navyAccent mb-2">Anda Belum Terdaftar di Event Mana Pun</h4>
                    <p class="text-gray-500 text-sm max-w-md mx-auto mb-6">
                        Segera amankan tiket ParentCamp Exhibition 2026 sebelum kuota pendaftaran terpenuhi.
                    </p>
                    <a href="{{ route('registration.index') }}" class="inline-block bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent font-extrabold px-6 py-3 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-cart-shopping mr-2"></i> Beli Tiket Exhibition Sekarang
                    </a>
                </div>
            </div>

            <!-- INFORMASI ACARA RINGKAS -->
            <div class="bg-white p-6 rounded-3xl shadow-md border border-gray-100 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-navyAccent mb-4 border-b border-gray-100 pb-3">Informasi Acara</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="flex items-start space-x-3">
                            <i class="fa-solid fa-calendar-day text-tealPrimary text-lg mt-0.5"></i>
                            <div>
                                <strong class="block text-navyAccent">Tanggal:</strong>
                                14 - 15 November 2026
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fa-solid fa-location-dot text-tealPrimary text-lg mt-0.5"></i>
                            <div>
                                <strong class="block text-navyAccent">Lokasi:</strong>
                                Grand Ballroom Convention Center
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fa-solid fa-headset text-tealPrimary text-lg mt-0.5"></i>
                            <div>
                                <strong class="block text-navyAccent">Bantuan Pendaftaran:</strong>
                                Hubungi admin via WhatsApp
                            </div>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('exhibition.landing') }}" class="mt-6 block text-center w-full bg-bgLight hover:bg-tealPrimary/10 text-tealPrimary font-bold py-3 rounded-xl border border-tealPrimary/20 transition text-sm">
                    Lihat Beranda Exhibition
                </a>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500">
        © 2026 ParentCamp Exhibition - Sekolah Impian. All rights reserved.
    </footer>

</body>
</html>