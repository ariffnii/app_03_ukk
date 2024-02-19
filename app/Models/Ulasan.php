<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = ['ulasan'];
    protected $primaryKey = ['id'];
    protected $guarded = ['id'];
    protected $fillable = [
        'ulasan',
        'rating'
    ];
}
