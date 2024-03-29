<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = User::where('role', 'user')->latest()->paginate(15);
        confirmDelete('Peminjam', 'Anda Yakin Ingin Menghapus Data Ini?');
        return view('admin.user.user_index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.user_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30|unique:users|max:30',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|string|min:10|max:15',
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
        return redirect()->route('user.index')->with(['success' => 'Data Peminjam berhasil ditambahkan']);
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
        $dataUser = User::findOrFail($id);
        return view('admin.user.user_edit', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30|unique:users|max:30',
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
        return redirect()->route('user.index')->with(['success' => 'Data Peminjam berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataUser = User::findOrFail($id);
        $dataUser->delete();
        toast('Data Peminjam berhasil dihapus', 'success');
        return redirect()->route('user.index')->with(['success' => 'Data Peminjam berhasil dihapus']);
    }
}
