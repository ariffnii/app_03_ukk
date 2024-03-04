<?php

namespace App\Models;

use App\Models\Ulasan;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'status'
    ];

    protected $table = 'bukus';

    public function kategoriBuku(){
        return $this->hasMany(KategoriBuku::class, 'buku_id');
    }

    public function kategori(){
        return $this->belongsToMany(Kategori::class, 'kategori_buku');
    }

    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_buku', 'id');
    }

    public function koleksi(){
        return $this->hasMany(Koleksi::class);
    }
}
