<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Struk;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class ADStrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struk = Struk::paginate(15);
        confirmDelete('Struk', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('admin.struk.struk_index', compact('struk'));
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
        return view('users.struk_show', compact('struk', 'peminjaman', 'buku'));
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
        $struk = Struk::findorFail($id);
        $struk->delete();
        toast('Data struk buku berhasil dihapus', 'success');
        return redirect()->route('struk.index');
    }
}
