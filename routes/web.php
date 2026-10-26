<?php

use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/registrasi');
});

// Route khusus user yang sudah login (Wali Santri)
// Sementara kita akses langsung tanpa login agar bisa diuji
Route::get('/registrasi', [RegistrasiController::class, 'create'])->name('registrasi.create');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::get('/registrasi/sukses/{id}', [RegistrasiController::class, 'sukses'])->name('registrasi.sukses');

Route::post('/tripay/callback', [RegistrasiController::class, 'callback']);


// Form Pendaftaran & Simpan Data
Route::get('/exhibition/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/exhibition/register', [RegistrationController::class, 'store'])->name('registration.store');

// Halaman Instruksi Pembayaran / Checkout
Route::get('/exhibition/checkout/{reference}', [RegistrationController::class, 'checkout'])->name('registration.checkout');

// Callback TriPay (Bisa diakses tanpa CSRF)
Route::post('/api/tripay/callback', [RegistrationController::class, 'handleCallback'])->name('tripay.callback');