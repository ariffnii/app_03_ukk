<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bookmark(){
        return $this->belongsTo(Bookmark::class, 'id_bookmark')->withDefault();
    }

    public function struk(){
        return $this->hasMany(Struk::class);
    }

    public function buku(){
        return $this->beLongsToMany(Buku::class, 'id_buku');
    }
}
