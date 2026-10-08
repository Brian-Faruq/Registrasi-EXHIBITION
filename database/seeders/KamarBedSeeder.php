<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Bed;
use Illuminate\Database\Seeder;

class KamarBedSeeder extends Seeder
{
    public function run(): void
    {
        $gedungs = ['Gedung Al-Ansar', 'Gedung Al-Muhajirin'];

        foreach ($gedungs as $gedung) {
            for ($i = 1; $i <= 3; $i++) {
                $kamar = Kamar::create([
                    'nama_gedung' => $gedung,
                    'nomor_kamar' => '10' . $i,
                    'kapasitas' => 6,
                ]);

                for ($b = 1; $b <= 6; $b++) {
                    Bed::create([
                        'kamar_id' => $kamar->id,
                        'nomor_bed' => (string) $b,
                        'status' => 'available',
                    ]);
                }
            }
        }
    }
}