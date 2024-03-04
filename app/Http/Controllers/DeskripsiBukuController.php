<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class DeskripsiBukuController extends Controller
{
    public function show(string $id)
    {
        $dbuku = Buku::with('ulasan')->findorFail($id);
        // menghitung rata rata rating buku
        $dbuku->rating = $dbuku->ulasan->avg('rating');

        return view('pages.deskripsiBuku', compact('dbuku'));
    }
}
