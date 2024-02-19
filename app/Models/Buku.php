<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = ['buku'];
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        '',
        'email',
        'password',
    ];

}
