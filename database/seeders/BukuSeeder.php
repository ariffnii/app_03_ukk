<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukuData = [
            [
                'judul' => 'judul',
                'penulis' => 'penulis',
                'penerbit' => 'penerbit',
                'tahun_terbit' => '2022',
                'cover' => 'cover1.png',
                'deskripsi' => 'deskripsi',
                'kategori' => 'fiksi',
                'stock' => '10',
            ],
            [
                'judul' => 'judul',
                'penulis' => 'penulis',
                'penerbit' => 'penerbit',
                'tahun_terbit' => '2022',
                'cover' => 'cover2.png',
                'deskripsi' => 'deskripsi',
                'kategori' => 'fiksi',
                'stock' => '10',
            ],
            [
                'judul' => 'judul',
                'penulis' => 'penulis',
                'penerbit' => 'penerbit',
                'tahun_terbit' => '2022',
                'cover' => 'cover3.png',
                'deskripsi' => 'deskripsi',
                'kategori' => 'fiksi',
                'stock' => '10',
            ],
            [
                'judul' => 'judul',
                'penulis' => 'penulis',
                'penerbit' => 'penerbit',
                'tahun_terbit' => '2022',
                'cover' => 'cover4.png',
                'deskripsi' => 'deskripsi',
                'kategori' => 'fiksi',
                'stock' => '10',
            ],
        ];
        foreach ($bukuData as $data) {
            $sourcePath = 'public/sneat/assets/img/cover-books/'. $data['cover'];
            $destinationPath = 'storage/app/public/'. $data['cover'];

            Storage::copy($sourcePath, $destinationPath);
            $coverUrl = Storage::url($destinationPath);

            Buku::create([
                'judul' => $data['judul'],
                'penulis' => $data['penulis'],
                'penerbit' => $data['penerbit'],
                'tahun_terbit' => $data['tahun_terbit'],
                'cover' => $data['cover'],
                'deskripsi' => $data['deskripsi'],
                'kategori' => $data['kategori'],
                'stock' => $data['stock'],
            ]);
        }
    }
}
