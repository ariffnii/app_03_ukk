<?php

namespace App\Models;

use App\Models\User;
use App\Models\Struk;
use App\Models\Bookmark;
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
