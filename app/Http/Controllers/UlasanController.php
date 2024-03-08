<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::latest()->paginate(15);
        confirmDelete('Ulasan', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('admin.ulasan.ulasan_index', compact('ulasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_buku)
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
        $ulasan = Ulasan::findorFail($id);
        return view('admin.ulasan.ulasan_show', compact('ulasan'));
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
        $ulasan = Ulasan::findorFail($id);
        $ulasan->delete();
        toast('Ulasan buku berhasil dihapus', 'success');
        return redirect()->route('ulasan.index');
    }
}
