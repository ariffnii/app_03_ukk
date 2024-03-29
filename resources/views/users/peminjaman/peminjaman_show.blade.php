@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Peminjaman</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $buku->judul }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penulis">Tanggal Pengajuan Peminjaman</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="penulis">{{ $upinjam->tgl_pinjam }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penulis">Tanggal Pengembalian</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="penulis">{{ $upinjam->tgl_kembali }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Jumlah Buku</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="tahun">{{ $upinjam->jumlah }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kategori">Status Peminjaman</label>
                    <div class="col-sm-10">
                        @if ($upinjam->status == 'dipinjam')
                            <span class="badge bg-label-warning">dipinjam</span>
                        @endif
                        @if ($upinjam->status == 'dikembalikan')
                            <span class="badge bg-label-success">dikembalikan</span>
                        @endif
                        @if ($upinjam->status == 'diambil')
                            <span class="badge bg-label-info">diambil</span>
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
