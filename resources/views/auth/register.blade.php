<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Sekolah Impian ParentCamp</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-tealDark via-tealPrimary to-navyAccent min-h-screen flex items-center justify-center p-4 antialiased">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/25 my-8">
        
        <!-- Header Logo -->
        <div class="p-6 text-center bg-white border-b border-gray-100">
            <div class="w-12 h-12 bg-tealPrimary/10 text-tealPrimary rounded-2xl flex items-center justify-center mx-auto mb-3 text-xl font-extrabold shadow-inner">
                <i class="fa-solid fa-school"></i>
            </div>
            <h2 class="text-xl font-extrabold text-navyAccent">Sekolah Impian</h2>
            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mt-0.5">ParentCamp Exhibition</p>
        </div>

        <!-- Tab Navigasi Halaman -->
        <div class="flex border-b border-gray-100 bg-gray-50/50 p-2">
            <a href="{{ route('login') }}" class="flex-1 py-2.5 text-center text-xs font-semibold rounded-xl text-gray-500 hover:text-navyAccent transition">
                <i class="fa-solid fa-right-to-bracket mr-1.5"></i> Masuk
            </a>
            <a href="{{ route('register') }}" class="flex-1 py-2.5 text-center text-xs font-extrabold rounded-xl bg-white text-navyAccent shadow-sm transition">
                <i class="fa-solid fa-user-plus mr-1.5 text-tealPrimary"></i> Daftar Akun
            </a>
        </div>

        <!-- Form Register -->
        <div class="p-6 sm:p-8">
            <div class="mb-6">
                <h3 class="text-base font-extrabold text-navyAccent">Buat Akun Baru</h3>
                <p class="text-xs text-gray-500 mt-1">Daftar untuk mulai memesan tiket Exhibition.</p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-600 mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400"><i class="fa-solid fa-user text-xs"></i></span>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama Orang Tua" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary focus:bg-white transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-600 mb-1.5">Nomor WhatsApp / HP</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400"><i class="fa-solid fa-phone text-xs"></i></span>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="081234567890" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary focus:bg-white transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-600 mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400"><i class="fa-solid fa-envelope text-xs"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary focus:bg-white transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-600 mb-1.5">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400"><i class="fa-solid fa-lock text-xs"></i></span>
                        <input type="password" name="password" required placeholder="Minimal 8 karakter" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary focus:bg-white transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold uppercase tracking-wider text-gray-600 mb-1.5">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400"><i class="fa-solid fa-lock text-xs"></i></span>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-bgLight border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tealPrimary focus:bg-white transition">
                    </div>
                </div>

                <button type="submit" class="w-full mt-2 bg-gradient-to-r from-orangeGold to-orangeHover text-navyAccent font-extrabold py-3 rounded-xl text-xs shadow-md transition transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-user-plus mr-2"></i> Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center pt-4 border-t border-gray-100">
                <a href="{{ url('/') }}" class="text-xs text-gray-400 hover:text-tealPrimary transition inline-flex items-center font-medium">
                    <i class="fa-solid fa-arrow-left mr-1.5"></i> Kembali ke Beranda Exhibition
                </a>
            </div>
        </div>
    </div>

</body>
</html>