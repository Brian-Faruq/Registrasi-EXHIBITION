<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk & Daftar - Sekolah Impian ParentCamp Exhibition</title>
    
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
                    },
                    animation: {
                        'float': 'float 4s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-6px)' },
                        }
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
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-navyAccent via-tealDark to-tealPrimary min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/20 my-8 transition-all duration-300">
        
        <!-- Header & Logo Visual Sekolah Impian -->
        <div class="p-6 pt-8 text-center bg-gradient-to-b from-bgLight to-white border-b border-gray-100 relative">
            
            <a href="{{ route('exhibition.landing') }}" class="inline-flex items-center space-x-3 group mb-3">
                <!-- SVG Logo Sekolah Impian (Huruf S Artistik dengan Animasi Floating) -->
                <div class="relative w-14 h-14 bg-white rounded-2xl p-2 shadow-lg shadow-tealDark/10 group-hover:scale-105 transition transform duration-300 animate-float flex items-center justify-center border border-tealPrimary/10">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <!-- Lengkungan Atas (Oranye) -->
                        <path d="M 50 15 C 75 15, 85 40, 55 55 C 40 62, 30 70, 30 80 C 30 90, 45 90, 50 90 C 70 90, 80 75, 80 75" fill="none" stroke="url(#orangeGrad)" stroke-width="14" stroke-linecap="round"/>
                        <!-- Lengkungan Bawah (Teal/Cyan) -->
                        <path d="M 50 85 C 25 85, 15 60, 45 45 C 60 38, 70 30, 70 20 C 70 10, 55 10, 50 10 C 30 10, 20 25, 20 25" fill="none" stroke="url(#tealGrad)" stroke-width="14" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="orangeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#F4A261" />
                                <stop offset="100%" stop-color="#E76F51" />
                            </linearGradient>
                            <linearGradient id="tealGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#00A896" />
                                <stop offset="100%" stop-color="#028090" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </a>

            <h1 class="text-2xl font-extrabold text-navyAccent tracking-tight">
                Sekolah <span class="text-orangeGold">Impian</span>
            </h1>
            <p class="text-xs font-semibold text-tealDark uppercase tracking-wider mt-0.5">ParentCamp Exhibition</p>

            <!-- Tab Switcher -->
            <div class="mt-6 bg-bgLight p-1 rounded-2xl flex border border-gray-200/80">
                <button type="button" id="tab-login" onclick="switchTab('login')" 
                        class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm bg-white text-navyAccent">
                    <i class="fa-solid fa-right-to-bracket mr-1.5 text-xs"></i> Masuk
                </button>
                <button type="button" id="tab-register" onclick="switchTab('register')" 
                        class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-gray-500 hover:text-navyAccent">
                    <i class="fa-solid fa-user-plus mr-1.5 text-xs"></i> Daftar Akun
                </button>
            </div>
        </div>

        <div class="p-6 sm:p-8">
            <!-- Penanganan Pesan Error Validation -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-xs space-y-1">
                    <div class="font-bold flex items-center">
                        <i class="fa-solid fa-circle-exclamation mr-2 text-red-500"></i> Terjadi kesalahan:
                    </div>
                    <ul class="list-disc list-inside pl-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ================= FORM LOGIN ================= -->
            <div id="form-login" class="transition-opacity duration-300">
                <div class="mb-5">
                    <h2 class="text-xl font-bold text-navyAccent">Selamat Datang Kembali</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Silakan masuk dengan akun yang sudah terdaftar.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Kata Sandi</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" required placeholder="••••••••"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center text-gray-600 font-medium cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-tealPrimary focus:ring-tealPrimary mr-2">
                            Ingat Saya
                        </label>
                        <a href="#" class="text-tealPrimary hover:text-tealDark font-semibold transition">Lupa sandi?</a>
                    </div>

                    <button type="submit" class="w-full mt-2 bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent font-extrabold py-3.5 rounded-xl shadow-md hover:shadow-orangeGold/40 transition transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-arrow-right-to-bracket mr-1.5"></i> Masuk Sekarang
                    </button>
                </form>
            </div>

            <!-- ================= FORM REGISTER ================= -->
            <div id="form-register" class="hidden transition-opacity duration-300">
                <div class="mb-5">
                    <h2 class="text-xl font-bold text-navyAccent">Buat Akun Baru</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Isi formulir di bawah untuk mendaftar acara ParentCamp.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama Lengkap Anda"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Nomor WhatsApp</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-brands fa-whatsapp"></i>
                            </span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="081234567890"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Kata Sandi</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" minlength="8" required placeholder="Minimal 8 karakter"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 text-sm">
                                <i class="fa-solid fa-shield-halved"></i>
                            </span>
                            <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi"
                                   class="w-full pl-10 pr-4 py-3 bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary text-sm text-navyAccent placeholder-gray-400 transition">
                        </div>
                    </div>

                    <div class="pt-1">
                        <label class="flex items-start text-xs text-gray-600 cursor-pointer">
                            <input type="checkbox" name="terms" required class="mt-0.5 rounded border-gray-300 text-tealPrimary focus:ring-tealPrimary mr-2">
                            <span>Saya menyetujui <a href="#" class="text-tealPrimary font-semibold hover:underline">Syarat & Ketentuan</a> yang berlaku.</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full mt-2 bg-gradient-to-r from-tealPrimary to-tealDark text-white font-extrabold py-3.5 rounded-xl shadow-md hover:shadow-tealPrimary/40 transition transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-user-check mr-1.5"></i> Daftar Akun Sekarang
                    </button>
                </form>
            </div>

            <!-- Tombol Kembali ke Beranda -->
            <div class="mt-8 text-center border-t border-gray-100 pt-5">
                <a href="{{ route('exhibition.landing') }}" class="text-xs text-gray-500 hover:text-navyAccent font-semibold transition inline-flex items-center">
                    <i class="fa-solid fa-arrow-left mr-1.5"></i> Kembali ke Beranda Exhibition
                </a>
            </div>

        </div>
    </div>

    <!-- JavaScript Tab Switcher -->
    <script>
        function switchTab(tab) {
            const loginForm = document.getElementById('form-login');
            const registerForm = document.getElementById('form-register');
            const loginTab = document.getElementById('tab-login');
            const registerTab = document.getElementById('tab-register');

            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');

                loginTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm bg-white text-navyAccent";
                registerTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-gray-500 hover:text-navyAccent";
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');

                registerTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm bg-white text-navyAccent";
                loginTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-gray-500 hover:text-navyAccent";
            }
            
            function switchTab(tab) {
        const loginForm = document.getElementById('form-login');
        const registerForm = document.getElementById('form-register');
        const loginTab = document.getElementById('tab-login');
        const registerTab = document.getElementById('tab-register');

        if (tab === 'login') {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');

            loginTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm bg-white text-navyAccent";
            registerTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-gray-500 hover:text-navyAccent";
        } else {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');

            registerTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm bg-white text-navyAccent";
            loginTab.className = "flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-gray-500 hover:text-navyAccent";
        }
    }

    // Otomatis pindah ke tab register jika ada error validasi pada form register
    @if ($errors->has('name') || $errors->has('phone') || ($errors->has('email') && Request::isMethod('post')) || $errors->has('password') && old('password_confirmation'))
        // Jika error berasal dari proses register, aktifkan tab register
        // (Opsional bisa disesuaikan berdasarkan kebutuhan controller Anda)
    @endif
            
        }
    </script>
</body>
</html>