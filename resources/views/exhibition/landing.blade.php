<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParentCamp Exhibition 2026 - Sekolah Impian</title>
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
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-6px)' },
                        }
                    },
                    animation: {
                        float: 'float 3s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-bgLight text-gray-800 font-sans antialiased selection:bg-tealPrimary selection:text-white">

    <!-- NAVBAR -->
    <nav class="bg-gradient-to-r from-navyAccent via-tealDark to-tealPrimary text-white shadow-xl sticky top-0 z-50 backdrop-blur-md bg-opacity-95 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- BRAND & LOGO (SEKOLAH IMPIAN & PARENTCAMP) -->
                <a href="#" class="flex items-center space-x-3 group">
                    <!-- SVG Visual Logo Sekolah Impian dengan Animasi Float & Shadow -->
                    <div class="relative w-12 h-12 bg-white rounded-2xl p-2 shadow-lg shadow-black/20 group-hover:scale-105 transition transform duration-300 animate-float flex items-center justify-center">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <!-- S Shape Cyan & Gradient -->
                            <path d="M 50 10 C 25 10, 15 35, 45 50 C 75 65, 75 90, 45 90 C 25 90, 15 75, 15 75" fill="none" stroke="url(#cyanGrad)" stroke-width="14" stroke-linecap="round"/>
                            <!-- S Shape Orange Ribbon -->
                            <path d="M 50 10 C 75 10, 85 35, 55 50 C 25 65, 25 90, 55 90" fill="none" stroke="url(#orangeGrad)" stroke-width="12" stroke-linecap="round"/>
                            <defs>
                                <linearGradient id="cyanGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#00A896" />
                                    <stop offset="100%" stop-color="#1D3557" />
                                </linearGradient>
                                <linearGradient id="orangeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#F4A261" />
                                    <stop offset="100%" stop-color="#E76F51" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-extrabold tracking-tight text-white group-hover:text-orangeGold transition">
                            Sekolah <span class="text-orangeGold">Impian</span>
                        </span>
                        <span class="text-xs text-teal-200 font-medium tracking-wide">ParentCamp Exhibition</span>
                    </div>
                </a>

                <!-- MENU NAVIGASI TENGAH -->
                <div class="hidden md:flex items-center space-x-8 font-medium">
                    <a href="#tentang" class="text-gray-100 hover:text-orangeGold transition duration-200">Tentang Acara</a>
                    <a href="#fasilitas" class="text-gray-100 hover:text-orangeGold transition duration-200">Fasilitas</a>
                    <a href="#tiket" class="text-gray-100 hover:text-orangeGold transition duration-200">Pilihan Tiket</a>
                </div>

                <!-- TOMBOL AUTH / LOGIN -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-orangeGold hover:bg-orangeHover text-navyAccent font-bold px-5 py-2.5 rounded-xl shadow-lg hover:shadow-orangeGold/30 transition transform hover:-translate-y-0.5">
                            <i class="fa-solid fa-gauge mr-1.5"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white/10 hover:bg-white/20 border border-white/30 text-white font-semibold px-5 py-2.5 rounded-xl transition backdrop-blur-sm">
                            <i class="fa-solid fa-right-to-bracket mr-1.5"></i> Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('registration.create') }}" class="hidden sm:inline-block bg-orangeGold hover:bg-orangeHover text-navyAccent font-bold px-5 py-2.5 rounded-xl shadow-lg transition transform hover:-translate-y-0.5">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="bg-gradient-to-b from-navyAccent via-tealDark to-tealPrimary text-white py-20 lg:py-28 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-flex items-center space-x-2 bg-orangeGold/20 text-orangeGold border border-orangeGold/40 font-semibold px-4 py-1.5 rounded-full text-sm mb-6 shadow-sm backdrop-blur-sm">
                        <span>Pameran & Seminar Parenting Terbesar</span>
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                        Membangun Generasi Cerdas & Berkarakter Bersama <span class="text-transparent bg-clip-text bg-gradient-to-r from-orangeGold to-amber-300">ParentCamp</span>
                    </h1>
                    <p class="text-lg text-teal-100 mb-8 leading-relaxed max-w-xl">
                        Temukan berbagai metode pengasuhan modern, konsultasi dengan pakar anak, serta nikmati beragam wahana edukatif dan produk anak terbaik di ParentCamp Exhibition 2026.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#tiket" class="bg-gradient-to-r from-orangeGold to-amber-500 hover:from-orangeHover hover:to-orangeGold text-navyAccent font-extrabold px-8 py-4 rounded-2xl text-center shadow-xl shadow-orangeGold/20 transition transform hover:-translate-y-1">
                            Beli Tiket Exhibition
                        </a>
                        <a href="#tentang" class="border-2 border-white/30 hover:bg-white/10 text-white font-bold px-8 py-4 rounded-2xl text-center backdrop-blur-sm transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- EVENT SUMMARY CARD -->
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 shadow-2xl relative">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">
                                <div class="w-12 h-12 bg-orangeGold/20 rounded-xl flex items-center justify-center text-orangeGold text-2xl shrink-0">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg text-white">Waktu Pelaksanaan</h4>
                                    <p class="text-teal-100 text-sm">14 - 15 November 2026</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">
                                <div class="w-12 h-12 bg-orangeGold/20 rounded-xl flex items-center justify-center text-orangeGold text-2xl shrink-0">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg text-white">Lokasi Event</h4>
                                    <p class="text-teal-100 text-sm">Grand Ballroom Sekolah Impian Convention Center</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">
                                <div class="w-12 h-12 bg-orangeGold/20 rounded-xl flex items-center justify-center text-orangeGold text-2xl shrink-0">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg text-white">Target Peserta</h4>
                                    <p class="text-teal-100 text-sm">Orang Tua, Calon Orang Tua & Pendidik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TENTANG PARENTCAMP EXHIBITION -->
    <section id="tentang" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-tealPrimary font-bold uppercase tracking-wider text-xs bg-tealPrimary/10 px-4 py-1.5 rounded-full">Mengenal Lebih Dekat</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-navyAccent mt-3 mb-4">Apa Itu ParentCamp Exhibition?</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-tealPrimary to-orangeGold mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg leading-relaxed">
                    ParentCamp Exhibition adalah ruang kolaboratif tahunan persembahan <strong class="text-tealDark">Sekolah Impian</strong> yang mempertemukan para orang tua dengan pakar psikologi anak, praktisi edukasi, serta penyedia teknologi pembelajaran modern.
                </p>
            </div>

            <div id="fasilitas" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- CARD 1 -->
                <div class="bg-bgLight p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-tealPrimary to-tealDark text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-tealPrimary/30 group-hover:scale-110 transition">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navyAccent mb-3 group-hover:text-tealPrimary transition">Talkshow & Workshop</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Sesi interaktif dan tanya jawab langsung bersama dokter anak, psikolog keluarga, serta pakar pola asuh modern.</p>
                </div>
                <!-- CARD 2 -->
                <div class="bg-bgLight p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-orangeGold to-orangeHover text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-orangeGold/30 group-hover:scale-110 transition">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navyAccent mb-3 group-hover:text-orangeHover transition">Edu-Tech Booths</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Pameran produk edukasi terbaru, perangkat lunak interaktif, mainan multisensori, hingga metode literasi koding usia dini.</p>
                </div>
                <!-- CARD 3 -->
                <div class="bg-bgLight p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-navyAccent to-tealDark text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-navyAccent/30 group-hover:scale-110 transition">
                        <i class="fa-solid fa-child-reaching"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navyAccent mb-3 group-hover:text-tealPrimary transition">Kids Activity Zone</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Area bermain dan kompetisi sensorik anak yang aman dan didampingi fasilitator berpengalaman saat orang tua mengikuti acara.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PILIHAN TIKET SECTION -->
    <section id="tiket" class="py-24 bg-gradient-to-b from-bgLight to-tealPrimary/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-navyAccent mb-4">Pilih Paket Tiket Exhibition</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-orangeGold to-tealPrimary mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg">Dapatkan pengalaman terbaik belajar parenting bersama Sekolah Impian.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
                @forelse($tickets as $ticket)
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl overflow-hidden flex flex-col justify-between border border-gray-100 hover:border-tealPrimary transition duration-300 transform hover:-translate-y-1">
                    <div class="p-8">
                        <span class="text-xs font-bold uppercase tracking-wider text-tealPrimary bg-tealPrimary/10 px-3 py-1 rounded-full">Tiket Resmi</span>
                        <h3 class="text-2xl font-bold text-navyAccent mt-4 mb-2">{{ $ticket->name }}</h3>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">{{ $ticket->description ?? 'Akses lengkap ke area pameran dan sesi acara utama.' }}</p>
                        <div class="text-4xl font-black text-navyAccent mb-6">
                            Rp {{ number_format($ticket->price, 0, ',', '.') }}
                            <span class="text-sm font-medium text-gray-400">/orang</span>
                        </div>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-center"><i class="fa-solid fa-circle-check text-tealPrimary mr-2.5"></i> Exhibition All Access Pass</li>
                            <li class="flex items-center"><i class="fa-solid fa-circle-check text-tealPrimary mr-2.5"></i> E-Sertifikat Kehadiran</li>
                            <li class="flex items-center"><i class="fa-solid fa-circle-check text-tealPrimary mr-2.5"></i> Access Kids Activity Zone</li>
                        </ul>
                    </div>
                    <div class="p-8 bg-gray-50 border-t border-gray-100">
                        @auth
                            <a href="{{ route('registrasi.create', ['ticket_id' => $ticket->id]) }}" 
                               class="block w-full text-center bg-tealPrimary hover:bg-tealDark text-white font-bold py-3.5 rounded-xl shadow-md transition">
                                Pilih Tiket Ini
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="block w-full text-center bg-navyAccent hover:bg-tealDark text-white font-bold py-3.5 rounded-xl shadow-md transition">
                                <i class="fa-solid fa-lock mr-2 text-xs"></i> Login untuk Membeli
                            </a>
                        @endauth
                    </div>
                </div>
                @empty
                <!-- TAMPILAN DEFAULT / STATIS -->
                <!-- REGULAR PASS -->
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100 flex flex-col justify-between hover:border-tealPrimary transition">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-tealPrimary bg-tealPrimary/10 px-3 py-1 rounded-full">Regular</span>
                        <h3 class="text-2xl font-bold text-navyAccent mt-4 mb-2">Tiket Regular Pass</h3>
                        <p class="text-gray-500 text-sm mb-6">Akses 1 Hari penuh ke area Exhibition & Main Stage Talkshow.</p>
                        <div class="text-4xl font-black text-navyAccent mb-6">Rp 150.000</div>
                    </div>
                    @auth
                        <a href="{{ route('registrasi.create') }}" class="block w-full text-center bg-tealPrimary hover:bg-tealDark text-white font-bold py-3.5 rounded-xl shadow transition">Daftar Tiket Regular</a>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-navyAccent hover:bg-tealDark text-white font-bold py-3.5 rounded-xl shadow transition">
                            <i class="fa-solid fa-lock mr-2 text-xs"></i> Login untuk Membeli
                        </a>
                    @endauth
                </div>

                <!-- VIP PASS -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-orangeGold relative flex flex-col justify-between transform lg:-translate-y-2">
                    <span class="absolute -top-3.5 right-8 bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent text-xs font-extrabold px-4 py-1.5 rounded-full shadow-md">Paling Populer</span>
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-orangeHover bg-orangeGold/10 px-3 py-1 rounded-full">VIP Pass</span>
                        <h3 class="text-2xl font-bold text-navyAccent mt-4 mb-2">VIP All Access Pass</h3>
                        <p class="text-gray-500 text-sm mb-6">Akses 2 Hari, Tempat Duduk Barisan Depan VIP & Goodie Bag Eksklusif.</p>
                        <div class="text-4xl font-black text-navyAccent mb-6">Rp 350.000</div>
                    </div>
                    @auth
                        <a href="{{ route('registration.index') }}" class="block w-full text-center bg-orangeGold hover:bg-orangeHover text-navyAccent font-bold py-3.5 rounded-xl shadow-lg transition">Daftar Tiket VIP</a>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-navyAccent hover:bg-tealDark text-white font-bold py-3.5 rounded-xl shadow transition">
                            <i class="fa-solid fa-lock mr-2 text-xs"></i> Login untuk Membeli
                        </a>
                    @endauth
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-navyAccent text-white py-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="flex items-center justify-center space-x-2">
                <span class="text-lg font-bold">Sekolah Impian</span>
                <span class="text-tealPrimary">•</span>
                <span class="text-gray-400">ParentCamp Exhibition</span>
            </div>
            <p class="text-gray-400 text-sm">© 2026 ParentCamp Exhibition. Powered by <span class="text-orangeGold font-semibold">Aksel Code</span>.</p>
        </div>
    </footer>

</body>
</html>