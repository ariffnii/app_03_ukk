<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'telepon' => '081234567890',
            'alamat' => 'Jl. user',
        ]);
        User::create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'telepon' => '081234567890',
            'alamat' => 'Jl. user',
        ]);
        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'telepon' => '081234567890',
            'alamat' => 'Jl. admin',
        ]);
    }
}