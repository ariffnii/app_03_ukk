<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
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
        $buku = Buku::latest()->paginate(15);
        confirmDelete('Buku', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('admin.buku.buku_index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.buku_form', compact('kategori'));
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
            'kategori' => 'required|array',
            'stock' => 'required|numeric',
            'status' => 'required|in:aktif,tdk_aktif',
        ]);
        $cover = $request->file('cover');
        $cover->storeAs('public', $cover->hashName());
        $dataBuku = Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'cover' => $cover->hashName(),
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'status' => $request->status
        ]);
        $dataBuku->kategori()->attach($request->input('kategori'));
        $dataBuku->save();
        alert('Data buku berhasil ditambahkan', 'success');
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findorFail($id);
        $kategori = $buku->kategori;
        return view('admin.buku.buku_show', compact('buku', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findorFail($id);
        $kategori = Kategori::all();
        return view('admin.buku.buku_edit', compact('buku', 'kategori'));
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
            'cover' => 'image|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'kategori' => 'required|array',
            'stock' => 'required|numeric',
            'status' => 'required|in:aktif,tdk_aktif',
        ]);

        $buku =  Buku::findorFail($id);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover->storeAs('public', $cover->hashName());

            Storage::delete('public' . $buku->cover);

            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'cover' => $cover->hashName(),
                'deskripsi' => $request->deskripsi,
                'stock' => $request->stock,
                'status' => $request->status
            ]);
            $buku->kategori()->sync($request->input('kategori'));
        } else {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi,
                'stock' => $request->stock,
                'status' => $request->status
            ]);
            $buku->kategori()->sync($request->input('kategori'));
        }
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findorFail($id);
        Storage::delete('public' . $buku->cover);
        $buku->kategori()->detach();
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
