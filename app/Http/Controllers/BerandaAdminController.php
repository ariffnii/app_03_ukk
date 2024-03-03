<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BerandaAdminController extends Controller
{
    public function index(){
        $user = User::where('role', 'user')->count();
        $buku = Buku::count();
        $kategori = Kategori::count();
        $peminjaman = Peminjaman::count();
        return view('admin.Beranda_index', compact('buku', 'kategori', 'peminjaman', 'user'));
    }
}
