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

        $guru = User::create([
            'name' => 'Guru SDN Cikijing 3',
            'email' => 'guru@cikijing3.sch.id',
            'password' => Hash::make('guru123'),
        ]);
        $guru->assignRole($guruRole);
    }
}
