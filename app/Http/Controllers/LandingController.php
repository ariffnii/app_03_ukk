<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dbuku = Buku::where('status', 'aktif')->get();
        return view('pages.landing-page', compact('dbuku'));
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
        $dbuku = Buku::with('ulasan')->findorFail($id);
        // menghitung rata rata rating buku
        $dbuku->rating = $dbuku->ulasan->avg('rating');
        $buku = Buku::findorFail($id);
        return view('pages.deskripsi_buku', compact('dbuku', 'buku'));
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
