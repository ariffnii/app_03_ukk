<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Struk;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Toaster;

class PeminjamanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upinjam = Peminjaman::where('id_user', Auth::user()->id)->latest()->paginate(15);
        return view('users.peminjaman.peminjaman_index', compact('upinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(string $id)
    {
        $user = User::findorFail(Auth::id());
        $buku = Buku::findorFail($id);
        return view('users.peminjaman.peminjaman_form', compact('user', 'buku'));
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
            'status' => 'required',
            'jumlah' => 'required|numeric'
        ]);
        $tgl_kembali = Carbon::parse($request->tgl_pinjam)->addDays(7)->toDateTimeString();
        $peminjaman = Peminjaman::create([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'status' => $request->status,
            'jumlah' => $request->jumlah
        ]);
        $buku = Buku::findorFail($request->id_buku);
        $buku->stock -= $request->jumlah;
        $buku->save();
        Struk::create([
            'id_peminjaman' => $peminjaman->id
        ]);
        toast('Peminjaman buku berhasil ditambahkan', 'success');
        return redirect()->route('peminjaman.user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $upinjam = Peminjaman::findorFail($id);
        $buku = Buku::findorFail($upinjam->id_buku);
        return view('users.peminjaman.peminjaman_show', compact('upinjam', 'buku'));
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
