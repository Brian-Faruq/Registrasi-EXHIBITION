<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Users (Opsional, untuk akun jika diperlukan)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Tabel Pakets (Paket kegiatan ParentCamp)
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 3. Tabel Registrasis (Pendaftaran peserta tanpa kamar)
        Schema::create('registrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('paket_id')->constrained('pakets')->cascadeOnDelete();
            $table->string('kode_unik')->unique();
            $table->string('nama_orang_tua');
            $table->string('nama_santri');
            $table->string('no_whatsapp');
            $table->integer('total_anggota');
            $table->text('rincian_anggota');
            $table->decimal('total_bayar', 10, 2);
            $table->string('status_pembayaran')->default('pending'); // pending, lunas
            $table->string('status_checkin')->default('belum'); // belum, sudah
            
            // Kolom pendukung untuk TriPay
            $table->string('reference')->nullable();
            $table->string('payment_method')->nullable();
            $table->text('checkout_url')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrasis');
        Schema::dropIfExists('pakets');
        Schema::dropIfExists('users');
    }
};