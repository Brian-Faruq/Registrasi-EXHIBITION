<?php

use App\Http\Controllers\RegistrasiController;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// 1. Landing Page Utama
Route::get('/', function () {
    $tickets = Ticket::all();
    return view('exhibition.landing', compact('tickets'));
})->name('exhibition.landing');

// 2. Halaman Autentikasi (GET)
Route::get('/login', function () {
    return view('auth.auth');
})->name('login');

Route::get('/register', function () {
    return view('auth.auth');
})->name('register');

// 3. Proses Register (Membuat User Baru & Otomatis Login)
Route::post('/register', function (Request $request) {
    $request->validate([
    'name' => 'required|string|max:255',
    'phone' => 'required|string|max:15',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:8|confirmed',
], [
    'password.min' => 'Kata sandi minimal harus 8 karakter.',
    'email.unique' => 'Email ini sudah terdaftar di sistem.',
    'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user); // Login otomatis setelah daftar
    $request->session()->regenerate();

    return redirect()->route('dashboard');
})->name('register.process');

// 4. Proses Login (Verifikasi Password & Catat Session)
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard'); // Berhasil masuk ke dashboard
    }

    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ])->onlyInput('email');
})->name('login.process');

// 5. Rute Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Area Terproteksi Middleware Auth (Wajib Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Mengarah ke form pendaftaran tiket yang sebelumnya dibuat
    Route::get('/registrasi', [RegistrasiController::class, 'create'])->name('registration.index');
    Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
    Route::get('/registrasi/sukses/{id}', [RegistrasiController::class, 'sukses'])->name('registrasi.sukses');
});

// 7. Callback TriPay
Route::post('/tripay/callback', [RegistrasiController::class, 'callback']);