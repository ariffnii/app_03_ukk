<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = ['buku'];
    protected $primaryKey = ['id'];
    protected $guarded = ['id'];
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
}
