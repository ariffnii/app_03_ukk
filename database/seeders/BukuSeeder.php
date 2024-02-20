<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul' => 'judul',
            'penulis' => 'penulis',
            'penerbit' => 'penerbit',
            'deskripsi' => 'deskripsi',
            'cover' => 'cover',
            'stok' => 10,
            'tahun_terbit' => '2022'
        ]);
    }
}
