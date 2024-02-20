<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upinjam = Peminjaman::where('id_user', Auth::user()->id)->get();
        return view('users.peminjaman_index', compact('upinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($id)
    {
        $upinjams = User::findorFail($id);
        $upinjam = Buku::findorFail($id);
        return view('users.peminjaman_form', compact('upinjam', 'upinjams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_buku' => 'required',
            'id_user' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'status' => 'required',
            'jumlah' => 'required|numeric'
        ]);
        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => $request->status,
            'jumlah' => $request->jumlah
        ]);
        return redirect()->route('peminjaman.user.index')->with(['success' => 'Data peminjaman buku berhasil ditambahkan']);
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
        //
    }
}
