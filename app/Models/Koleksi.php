<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksi extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = ['peminjaman'];
    protected $primaryKey = ['id'];
    protected $guarded = ['id'];
    protected $fillable = [

    ];
}
