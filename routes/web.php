<?php

use App\Http\Controllers\RegistrasiController;
use App\Models\Paket;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - ParentCamp Exhibition
|--------------------------------------------------------------------------
*/

// Rute Publik (Landing Page)
Route::get('/', function () {
    $tickets = Paket::all(); 
    return view('exhibition.landing', compact('tickets'));
})->name('landing')->name('exhibition.landing');

// Halaman Autentikasi (Login & Register)
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('dashboard');
})->name('register.process');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ])->onlyInput('email');
})->name('login.process');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


// RUTE PENDAFTARAN PUBLIK (Diberikan nama alias lengkap agar terpanggil dengan benar)
Route::get('/registrasi', [RegistrasiController::class, 'create'])
    ->name('registrasi.create');


// Area Terproteksi Middleware Auth (Wajib Login)
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Pengguna
    Route::get('/dashboard', function () {
        $registrasi = Registrasi::where('user_id', Auth::id())->with('paket')->latest()->first();
        return view('dashboard', compact('registrasi'));
    })->name('dashboard');

    // Proses Simpan Pendaftaran
    Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
    
    // Sukses & Cetak Tiket E-Ticket
    Route::get('/registrasi/sukses/{id}', [RegistrasiController::class, 'sukses'])->name('registrasi.sukses');
    Route::get('/registrasi/cetak/{id}', [RegistrasiController::class, 'cetakTiket'])->name('registrasi.cetak');
});

// Callback TriPay
Route::post('/tripay/callback', [RegistrasiController::class, 'callback']);