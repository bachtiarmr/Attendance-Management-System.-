<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Divisi dulu
        $divisis = ['IT', 'HRD', 'Finance', 'Marketing'];
        foreach ($divisis as $d) {
            $divisi = Divisi::create(['nama_divisi' => $d]);

            // 2. Buat satu akun user per divisi
            User::create([
                'name' => 'Karyawan ' . $d,
                'email' => strtolower($d) . '@present.com',
                'password' => Hash::make('password123'),
                'divisi_id' => $divisi->id,
                'role' => 'user',
            ]);
        }

        // 3. Buat akun Admin utama
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@present.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}