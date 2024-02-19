<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Buku as Model;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    protected $viewIndex = 'buku_index';
    protected $viewCreate = 'buku_form';
    protected $viewEdit = 'buku_form';
    protected $routePrefix = 'buku';
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {

        $buku = Model::all();
        dd($buku);
        return view('admin.buku_index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
