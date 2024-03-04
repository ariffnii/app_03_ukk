@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Peminjaman</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('peminjaman.user.create', $buku->id) }}">
                    @csrf
                    <input type="text" name="id_user" class="form-control" value="{{ $user->id }}" hidden>
                    <input type="text" name="id_buku" class="form-control" value="{{ $buku->id }}" hidden>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $buku->judul }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Stock Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $buku->stock }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Tanggal Pengajuan Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_pinjam" class="form-control" id="penulis" placeholder="">
                        </div>
                        @error('tgl_pinjam')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <input type="text" name="jumlah" class="form-control" id="tahun" placeholder="">
                        </div>
                        @error('jumlah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="kategori" hidden>Status Peminjaman</label>
                        <div class="col-sm-10">
                            <select id="kategori" name="status" class="form-select form-control" hidden>
                                <option>Status</option>
                                <option value="dipinjam" selected>Dipinjam</option>
                            </select>
                        </div>
                        @error('status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('user.beranda') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
