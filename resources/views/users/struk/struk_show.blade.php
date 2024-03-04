@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Struk</h5>
            </div>
            <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Id Struk</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $struk->id_struk }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Id Peminjaman</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="penulis">{{ $struk->id_peminjaman }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="penulis">{{ $buku->judul }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="tahun">{{ $peminjaman->jumlah }}</label>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('struk.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
