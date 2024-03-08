@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Buku</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->judul }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penulis">Penulis</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->penulis }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penerbit">Penerbit</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->penerbit }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->tahun_terbit }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="cover">Cover</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="" width="100px" height="100px">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->deskripsi }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                    <div class="col-sm-10">
                        @foreach ($buku->kategori as $category)
                            <label class="col-sm-2 col-form-label" for="judul">{{ $category->nm_kategori }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="stock">Stock</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->stock }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="stock">Status</label>
                    <div class="col-sm-10">
                        @if ($buku->status == 'aktif')
                            <span class="badge bg-label-success">Aktif</span></span>
                        @endif
                        @if ($buku->status == 'tdk_aktif')
                            <span class="badge bg-label-danger">Tidak Aktif</span></span>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a onclick="window.history.back()" class="btn btn-secondary text-white">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
