<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class OfcPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::latest()->paginate(15);
        return view('officer.peminjaman.peminjaman_index', compact('peminjaman'));
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
        $peminjaman = Peminjaman::findorFail($id);
        return view('officer.peminjaman.peminjaman_show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findorFail($id);
        return view('officer.peminjaman.peminjaman_edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_buku' => 'required',
            'id_user' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'status' => 'required',
            'jumlah' => 'required|numeric'
        ]);
        $peminjaman = Peminjaman::findorFail($id);

        $buku = Buku::findorFail($request->id_buku);

        $peminjaman->update([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => $request->status,
            'jumlah' => $request->jumlah
        ]);
        if ($request->status === 'dikembalikan') {
            $buku->stock += $peminjaman->jumlah;
            $buku->save();
        }
        toast('Data peminjaman buku berhasil diubah', 'success');
        return redirect()->route('peminjaman-ofc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
