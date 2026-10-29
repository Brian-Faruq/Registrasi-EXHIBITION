<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ParentCamp Exhibition</title>
    <!-- Tailwind CSS -->
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
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col justify-between antialiased">

    <!-- NAVBAR ATAS -->
    <header class="bg-navyAccent shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-tealPrimary rounded-xl flex items-center justify-center text-white font-extrabold shadow">
                    <i class="fa-solid fa-school"></i>
                </div>
                <span class="text-white font-extrabold text-lg tracking-tight">ParentCamp <span class="text-orangeGold">Dashboard</span></span>
            </div>
            
            <div class="flex items-center space-x-4">
                <span class="text-gray-300 text-xs hidden sm:inline-block">
                    <i class="fa-solid fa-user-circle mr-1 text-tealPrimary"></i> {{ Auth::user()->name ?? 'Pengguna' }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-xl transition shadow flex items-center">
                        <i class="fa-solid fa-right-from-bracket mr-1.5"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
        
        <!-- BANNER SELAMAT DATANG -->
        <div class="bg-gradient-to-r from-navyAccent via-tealDark to-tealPrimary rounded-3xl p-6 sm:p-8 text-white shadow-xl mb-8 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 text-white/5 text-9xl font-extrabold pointer-events-none">
                <i class="fa-solid fa-ticket"></i>
            </div>
            <div class="relative z-10 max-w-2xl">
                <span class="bg-orangeGold/20 text-orangeGold text-[11px] font-extrabold px-3 py-1 rounded-full uppercase tracking-widest inline-block mb-3 border border-orangeGold/30">
                    Selamat Datang
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Halo, {{ Auth::user()->name ?? 'Ayah/Bunda' }}!</h1>
                <p class="text-xs sm:text-sm text-teal-100 mt-2 leading-relaxed">
                    Pantau status pendaftaran tiket Exhibition Anda atau kelola kehadiran acara Sekolah Impian dengan mudah melalui panel dashboard ini.
                </p>
            </div>
        </div>

        <!-- GRID UTAMA (STATUS TIKET & INFORMASI ACARA) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KOLOM KIRI & TENGAH: STATUS TIKET (Span 2) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
                        <h3 class="text-base font-extrabold text-navyAccent flex items-center">
                            <i class="fa-solid fa-ticket text-tealPrimary mr-2"></i> Status Tiket Exhibition Anda
                        </h3>
                        @if(isset($registrasi) && $registrasi)
                            <span class="px-3.5 py-1.5 bg-emerald-50 text-emerald-700 font-extrabold text-xs rounded-full border border-emerald-200 flex items-center">
                                <i class="fa-solid fa-circle-check mr-1.5 text-emerald-500"></i> 
                                Terdaftar ({{ ucfirst($registrasi->status_pembayaran) }})
                            </span>
                        @else
                            <span class="px-3.5 py-1.5 bg-amber-50 text-amber-700 font-extrabold text-xs rounded-full border border-amber-200 flex items-center">
                                <i class="fa-solid fa-clock mr-1.5 text-amber-500"></i> Belum Memiliki Tiket
                            </span>
                        @endif
                    </div>

                    @if(isset($registrasi) && $registrasi)
                        <!-- TAMPILAN KARTU E-TICKET EKSKLUSIF -->
                        <div class="bg-gradient-to-br from-tealDark via-tealPrimary to-tealDark text-white p-6 sm:p-8 rounded-2xl shadow-xl relative overflow-hidden border border-teal-400/30">
                            <div class="absolute right-0 top-0 transform translate-x-6 -translate-y-6 w-32 h-32 bg-white/10 rounded-full pointer-events-none blur-xl"></div>
                            
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center relative z-10 gap-6">
                                <div class="space-y-1">
                                    <span class="text-[11px] text-teal-200 uppercase tracking-widest font-extrabold">
                                        <i class="fa-solid fa-id-card mr-1"></i> TICKET PASS • PARENTCAMP
                                    </span>
                                    <h4 class="text-2xl font-extrabold text-white tracking-tight">{{ $registrasi->paket->nama_paket ?? 'Paket Exhibition' }}</h4>
                                    <div class="text-xs text-teal-100 pt-2 space-y-1">
                                        <p>Orang Tua: <strong class="text-white font-semibold">{{ $registrasi->nama_orang_tua }}</strong></p>
                                        <p>Santri: <strong class="text-white font-semibold">{{ $registrasi->nama_santri }}</strong></p>
                                    </div>
                                </div>
                                
                                <div class="text-center md:text-right bg-white/10 p-4 rounded-2xl border border-white/20 backdrop-blur-md w-full md:w-auto shadow-inner">
                                    <span class="block text-[10px] text-teal-100 uppercase tracking-widest font-bold">Kode Unik Check-In</span>
                                    <span class="text-2xl font-mono font-extrabold text-orangeGold tracking-wider mt-0.5 block">{{ $registrasi->kode_unik }}</span>
                                </div>
                            </div>

                            <div class="mt-6 pt-5 border-t border-white/20 flex flex-wrap justify-between items-center gap-4 relative z-10">
                                <span class="text-xs text-teal-100 font-medium">
                                    <i class="fa-solid fa-users mr-1.5 text-orangeGold"></i> Total Kehadiran: <strong class="text-white">{{ $registrasi->total_anggota }} Orang</strong>
                                </span>
                                
                                <!-- Tombol Cetak Tiket -->
                                <a href="{{ route('registrasi.cetak', $registrasi->id) }}" target="_blank" 
                                   class="bg-orangeGold hover:bg-orangeHover text-navyAccent font-extrabold px-5 py-2.5 rounded-xl text-xs shadow-lg transition transform hover:-translate-y-0.5 inline-flex items-center">
                                    <i class="fa-solid fa-print mr-2"></i> Cetak Tiket Fisik
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- TAMPILAN JIKA BELUM BELI TIKET -->
                        <div class="text-center py-10 px-4 bg-bgLight rounded-2xl border border-dashed border-gray-200">
                            <div class="w-16 h-16 bg-orange-50 text-orangeGold rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-inner border border-orange-100">
                                <i class="fa-solid fa-ticket-simple"></i>
                            </div>
                            <h4 class="text-base font-bold text-navyAccent mb-1">Anda Belum Terdaftar di Event Mana Pun</h4>
                            <p class="text-xs text-gray-500 max-w-sm mx-auto mb-6 leading-relaxed">
                                Segera amankan tiket ParentCamp Exhibition 2026 sebelum kuota pendaftaran terpenuhi dan nikmati rangkaian acaranya.
                            </p>
                            <a href="{{ route('registrasi.create') }}" class="inline-flex items-center bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent font-extrabold px-6 py-3 rounded-xl text-xs shadow-md transition transform hover:-translate-y-0.5">
                                <i class="fa-solid fa-cart-shopping mr-2"></i> Beli Tiket Exhibition Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- KOLOM KANAN: INFORMASI ACARA (Span 1) -->
            <div class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-base font-extrabold text-navyAccent mb-5 pb-3 border-b border-gray-100 flex items-center">
                        <i class="fa-solid fa-circle-info text-tealPrimary mr-2"></i> Informasi Acara
                    </h3>

                    <div class="space-y-4 text-xs text-gray-600">
                        <div class="flex items-start space-x-3 p-3 bg-bgLight rounded-2xl">
                            <div class="w-8 h-8 rounded-xl bg-teal-50 text-tealPrimary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div>
                                <span class="block font-bold text-navyAccent">Tanggal Pelaksanaan</span>
                                <span class="text-gray-500">14 - 15 November 2026</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-3 bg-bgLight rounded-2xl">
                            <div class="w-8 h-8 rounded-xl bg-teal-50 text-tealPrimary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <span class="block font-bold text-navyAccent">Lokasi Utama</span>
                                <span class="text-gray-500">Grand Ballroom Convention Center</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-3 bg-bgLight rounded-2xl">
                            <div class="w-8 h-8 rounded-xl bg-teal-50 text-tealPrimary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-brands fa-whatsapp text-emerald-600"></i>
                            </div>
                            <div>
                                <span class="block font-bold text-navyAccent">Bantuan Pendaftaran</span>
                                <span class="text-gray-500">Hubungi admin via WhatsApp resmi sekolah</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Lihat Beranda -->
                    <div class="mt-6 pt-4 border-t border-gray-100">
                      <a href="{{ url('/') }}" class="block w-full text-center bg-tealPrimary ...">
                          <i class="fa-solid fa-globe mr-1.5"></i> Lihat Beranda Exhibition
                      </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-100 mt-12 py-6 text-center text-xs text-gray-400">
        <p>&copy; 2026 ParentCamp Exhibition - Sekolah Impian. All rights reserved.</p>
    </footer>

</body>
</html>