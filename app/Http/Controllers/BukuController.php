<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        //get posts
        $buku = Buku::latest()->paginate(15);

        //render view with posts
        return view('admin.buku_index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'kategori' => 'required|in:fiksi,non_fiksi',
            'stock' => 'required|numeric',
        ]);
        $cover = $request->file('cover');
        $cover->storeAs('public/cover_book', $cover->hashName());
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'cover' => $cover->hashName(),
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'stock' => $request->stock,
        ]);
        return redirect()->route('buku.index')->with(['success' => 'Data buku berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findorFail($id);
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findorFail($id);
        return view('admin.buku_edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'kategori' => 'required|in:fiksi,non_fiksi',
            'stock' => 'required|numeric',
        ]);

        $buku =  Buku::findorFail($id);

        if($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover->storeAs('public/cover_book', $cover->hashName());
            Storage::delete('public/cover_book'.$buku->cover);

            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'cover' => $cover->hashName(),
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'stock' => $request->stock,
            ]);
        } else {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'stock' => $request->stock,
            ]);
        }
        return redirect()->route('buku.index')->with(['success' => 'Data buku berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findorFail($id);
        Storage::delete('public/sneat/assets/img/buku'. $buku->cover);
        $buku->delete();
        return redirect()->route('buku.index')->with(['success' => 'Data buku berhasil dihapus']);
    }
}
