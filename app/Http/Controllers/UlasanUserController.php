<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_buku)
    {
        $user = User::findorFail(Auth::id());
        $buku = Buku::findorFail($id_buku);
        return view('users.ulasan.ulasan_form', compact('user', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'buku_id' => 'required',
            'user_id' => 'required',
            'komentar' => 'nullable|string|max:30',
            'rating' => 'required',
        ]);
        $existingReview = Ulasan::where('buku_id', $request->buku_id)
            ->where('user_id', $request->user_id)
            ->exists();
        if ($existingReview) {
            return redirect()->back()->with('error', 'Anda sudah membuat ulasan untuk buku ini.');
        }
        Ulasan::create([
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        toast('Ulasan berhasil ditambahkan', 'success');
        return redirect()->route('peminjaman.user');
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
        $ulasan = Ulasan::findorFail($id);
        $buku = Buku::findorFail($ulasan->buku_id);
        $user = User::findorFail($ulasan->user_id);
        return view('users.ulasan.ulasan_edit', compact('ulasan', 'buku', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'komentar' => 'nullable|string|max:30',
            'rating' => 'required',
        ]);
        $ulasan = Ulasan::findorFail($id);
        $ulasan->update([
            'komentar' => $request->komentar,
            'rating' => $request->rating
        ]);
        toast('Ulasan berhasil diubah', 'success');
        return redirect()->route('peminjaman.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
