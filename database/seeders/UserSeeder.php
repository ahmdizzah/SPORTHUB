<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat akun untuk admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin2@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'username' => 'Admin',
            'tgl_lahir' => '2000-01-01',
            'berat_badan' => '0',
            'tinggi_badan' => '0',
        ]);
    }
}
