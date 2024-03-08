<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Struk;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StrukUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $struk = Struk::join('peminjamen', 'peminjamen.id', '=', 'struks.id_peminjaman')
        ->where('peminjamen.id_user', $id_user)
        ->orderBy('peminjamen.id', 'desc')->paginate(15);
        return view('users.struk.struk_index', compact('struk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $struk = Struk::findorFail($id);
        $peminjaman = Peminjaman::findorFail($struk->id_peminjaman);
        $buku = Buku::findorFail($peminjaman->id_buku);
        return view('users.struk.struk_show', compact('struk', 'peminjaman', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
