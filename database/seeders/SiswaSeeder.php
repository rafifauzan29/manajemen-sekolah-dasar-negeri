<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelasList = Kelas::all();
        $nisnCounter = 2500000000; // Angka awal supaya panjangnya tetap 10 digit

        foreach ($kelasList as $kelas) {
            for ($i = 1; $i <= 20; $i++) {
                Siswa::create([
                    'nama' => "Siswa {$kelas->nama_kelas} {$i}",
                    'nisn' => (string) ($nisnCounter++), // Selalu tambah biar unik
                    'alamat' => 'Cikijing, Majalengka',
                    'kelas_id' => $kelas->id,
                ]);
            }
        }
    }
}
