<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\User;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelasList = [];

        for ($tingkat = 1; $tingkat <= 6; $tingkat++) {
            foreach (['A', 'B'] as $huruf) {
                $guru = User::where('email', strtolower("guru{$tingkat}{$huruf}@cikijing3.sch.id"))->first();

                $kelasList[] = [
                    'nama_kelas' => "{$tingkat}{$huruf}",
                    'wali_kelas_id' => $guru?->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Kelas::insert($kelasList);
    }
}
