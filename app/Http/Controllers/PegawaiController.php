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
        confirmDelete('Pegawai', 'Anda Yakin Ingin Menghapus Data Ini?');
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
            'name' => 'required|string|max:30|unique:users',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|string|min:10|max:15',
            'alamat' => 'required|string|max:100',
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
        toast('Data pegawai berhasil ditambahkan', 'success');
        return redirect()->route('pegawai.index');
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
            'name' => 'required|string|max:30|unique:users',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'required|string|min:10|max:15',
            'alamat' => 'required|string|max:100',
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
        toast('Data pegawai berhasil diubah', 'success');
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $dataPegawai = User::findOrFail($id);
        $dataPegawai->delete();
        toast('Data pegawai berhasil dihapus', 'success');
        return redirect()->route('pegawai.index');
    }
}
