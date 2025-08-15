<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $guruRole = Role::firstOrCreate(['name' => 'guru']);

        $admin = User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@cikijing3.sch.id',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole($adminRole);

        $guruUtama = User::create([
            'name' => 'Guru Utama',
            'email' => 'guru@cikijing3.sch.id',
            'password' => Hash::make('guru123'),
        ]);
        $guruUtama->assignRole($guruRole);

        for ($tingkat = 1; $tingkat <= 6; $tingkat++) {
            foreach (['A', 'B'] as $huruf) {
                $guru = User::create([
                    'name' => "Guru Kelas {$tingkat}{$huruf}",
                    'email' => strtolower("guru{$tingkat}{$huruf}@cikijing3.sch.id"),
                    'password' => Hash::make('guru123'),
                ]);
                $guru->assignRole($guruRole);
            }
        }
    }
}
