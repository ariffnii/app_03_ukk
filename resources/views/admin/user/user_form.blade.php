@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Peminjam</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="judul" placeholder="">
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="penulis" placeholder="">
                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penerbit">No Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telepon" class="form-control" id="penerbit" placeholder="">
                        </div>
                        @error('telepon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" id="tahun" placeholder="">
                        </div>
                        @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="kategori">Role</label>
                        <div class="col-sm-10">
                            <select id="kategori" name="role" class="form-select form-control">
                                <option>Pilih Role</option>
                                <option value="user" selected>Peminjam</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="tahun" placeholder="">
                        </div>
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a onclick="window.history.back()" class="btn btn-secondary text-white">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
