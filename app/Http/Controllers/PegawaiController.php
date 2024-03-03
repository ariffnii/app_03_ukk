<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPegawai = User::where('role', '<>', 'user')->latest()->paginate(15);
        return view('admin.pegawai.pegawai_index', compact('dataPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pegawai.pegawai_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $dataPegawai = User::findOrFail($id);
        return view('admin.pegawai.pegawai_edit', compact('dataPegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $dataPegawai = User::findOrFail($id);
        $dataPegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil dihapus']);
    }
}
