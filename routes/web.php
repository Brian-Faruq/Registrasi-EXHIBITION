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