<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function struk(){
        return $this->belongsTo(Struk::class, 'id_peminjaman', 'id_struk');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
