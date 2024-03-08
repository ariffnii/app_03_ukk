@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Peminjam</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="judul">Username</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $user->name }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penulis">Email</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="penulis">{{ $user->email }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penerbit">No Telephone</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="penerbit">{{ $user->telepon }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Alamat</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="tahun">{{ $user->alamat }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Role</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="tahun">{{ $user->role }}</label>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a onclick="window.history.back()" class="btn btn-secondary text-white">Back</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
