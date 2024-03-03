<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_struk';
    protected $fillable = [
        'id_peminjaman',
    ];

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id_peminjaman', 'id');
    }
}
