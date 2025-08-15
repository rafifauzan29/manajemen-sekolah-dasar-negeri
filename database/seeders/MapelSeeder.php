<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $mapelList = [
            'Bahasa Indonesia',
            'Matematika',
            'Ilmu Pengetahuan Alam (IPA)',
            'Ilmu Pengetahuan Sosial (IPS)',
            'Pendidikan Pancasila dan Kewarganegaraan (PPKn)',
            'Pendidikan Jasmani, Olahraga, dan Kesehatan (PJOK)',
            'Seni Budaya dan Prakarya (SBdP)',
            'Bahasa Sunda',
            'Pendidikan Agama Islam',
            'Pendidikan Agama Kristen',
        ];

        foreach ($mapelList as $mapel) {
            Mapel::create(['nama_mapel' => $mapel]);
        }
    }
}
