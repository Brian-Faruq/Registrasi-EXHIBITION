<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Masukkan data paket contoh ke database
        Paket::create([
            'nama_paket' => 'Paket Reguler ParentCamp',
            'harga' => 150000,
            'deskripsi' => 'Fasilitas kegiatan lengkap untuk 1 orang peserta.',
        ]);

        Paket::create([
            'nama_paket' => 'Paket Keluarga (Hemat)',
            'harga' => 250000,
            'deskripsi' => 'Fasilitas kegiatan lengkap untuk keluarga / rombongan.',
        ]);
    }
}