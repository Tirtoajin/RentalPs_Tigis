<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat User Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@rentalps.com',
            'password' => bcrypt('password123'), // ganti dengan password aman
            'role' => 'admin',
        ]);

        // Membuat User Pelanggan (opsional)
        User::create([
            'name' => 'Budi Pelanggan',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
        ]);
    }
}