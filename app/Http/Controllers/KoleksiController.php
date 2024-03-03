<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koleksi = Koleksi::where('id_user', Auth::user()->id)->get();
        confirmDelete('Koleksi', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('users.koleksi.koleksi_index', compact('koleksi'));
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
        $this->validate($request, [
            'id_buku' => 'required',
            'id_user' => 'required'
        ]);

        $koleksi = Koleksi::where('id_buku', $request->id_buku)
            ->where('id_user', $request->id_user)
            ->first();

        if ($koleksi) {
            return redirect()->back()->with(['warning' => 'Buku sudah ada dalam koleksi Anda!']);
        }

        Koleksi::create([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user
        ]);
        toast('Data koleksi buku berhasil ditambahkan', 'success');
        return redirect()->route('deskripsi.show', $request->id_buku);
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
        $koleksi = Koleksi::findorfail($id);
        $koleksi->delete();
        toast('Data koleksi buku berhasil dihapus', 'success');
        return redirect()->route('koleksi.index');
    }
}
