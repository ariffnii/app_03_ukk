<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::latest()->paginate(15);
        confirmDelete('Kategori', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('admin.kategori.kategori_index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.kategori_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_kategori' => 'required|unique:kategoris'
        ]);
        Kategori::create([
            'nm_kategori' => $request->nm_kategori
        ]);
        toast('Data kategori buku berhasil ditambahkan', 'success');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findorFail($id);
        return view('admin.kategori.kategori_edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nm_kategori' => 'required|unique:kategoris'
        ]);
        Kategori::where('id', $id)->update([
            'nm_kategori' => $request->nm_kategori
        ]);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findorFail($id);
        $kategori->delete();
        toast('Data kategori buku berhasil dihapus', 'success');
        return redirect()->route('kategori.index');
    }
}
