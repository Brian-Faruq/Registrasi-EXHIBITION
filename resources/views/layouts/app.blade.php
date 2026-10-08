<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Exhibition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased">
    <header class="bg-indigo-700 text-white shadow-md py-4">
        <div class="max-w-5xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">Exhibition Santri 2026</h1>
            <span class="text-xs bg-indigo-500 px-3 py-1 rounded-full">Sistem Registrasi & Booking Bed</span>
        </div>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="text-center py-6 text-slate-500 text-sm">
        &copy; 2026 Registrasi Exhibition Santri. All rights reserved.
    </footer>
</body>
</html>