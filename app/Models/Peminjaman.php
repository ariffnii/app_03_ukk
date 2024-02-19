<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = ['Ulasan'];
    protected $primaryKey = ['id'];
    protected $guarded = ['id'];
    protected $fillable = [
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah',
        'status'
    ];
}
