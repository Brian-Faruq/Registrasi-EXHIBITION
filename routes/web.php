<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;

Route::get('/', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::get('/tiket/{id}', [RegistrasiController::class, 'tiket'])->name('registrasi.tiket');