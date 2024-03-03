<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_kategori',
    ];
    protected $table = 'kategoris';

    public function kategoriBuku(){
        return $this->hasMany(KategoriBuku::class, );
    }

    public function buku(){
        return $this->belongsToMany(Buku::class, 'kategori_buku');
    }
}
