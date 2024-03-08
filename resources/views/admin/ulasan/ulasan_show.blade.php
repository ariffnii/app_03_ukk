@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Ulasan</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $ulasan->buku->judul }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="stock">Username</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $ulasan->user->name }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="stock">Rating</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $ulasan->rating }}</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="stock">Ulasan</label>
                    <div class="col-sm-10">
                        <label class="col-sm-2 col-form-label" for="judul">{{ $ulasan->komentar }}</label>
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
