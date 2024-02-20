<?php

namespace App\Models;

use App\Models\Ulasan;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'cover',
        'deskripsi',
        'kategori',
        'stock',
    ];

    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }

    public function peminjaman(){
        return $this->hasOne(Peminjaman::class);
    }

    public function koleksi(){
        return $this->hasMany(Koleksi::class);
    }
}
