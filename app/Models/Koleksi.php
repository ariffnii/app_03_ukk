<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = ['peminjaman'];
    protected $primaryKey = ['id'];
    protected $guarded = ['id'];
    protected $fillable = [

    ];
}
