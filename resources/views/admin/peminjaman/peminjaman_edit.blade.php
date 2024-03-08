@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Peminjaman</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <input type="text" name="id_user" class="form-control" value="{{ $peminjaman->id_user }}" hidden>
                        <input type="text" name="id_buku" class="form-control" value="{{ $peminjaman->id_buku }}" hidden>
                        <label class="col-sm-2 col-form-label" for="judul">Username</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $peminjaman->user->name }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $peminjaman->buku->judul }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Tanggal Pengajuan Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_pinjam" class="form-control" id="penulis" placeholder=""
                                value="{{ $peminjaman->tgl_pinjam }}" readonly>
                        </div>
                        @error('tgl_pinjam')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="penulis">Tanggal Pengembalian</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_kembali" class="form-control" id="penulis" placeholder=""
                                value="{{ $peminjaman->tgl_kembali }}" readonly>
                        </div>
                        @error('tgl_kembali')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <input type="text" name="jumlah" class="form-control" id="tahun" placeholder=""
                                value="{{ $peminjaman->jumlah }}" readonly>
                        </div>
                        @error('jumlah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="kategori">Status Peminjaman</label>
                        <div class="col-sm-10">
                            <select id="kategori" name="status" class="form-select form-control">
                                <option>Status</option>
                                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam
                                </option>
                                <option value="diambil" {{ $peminjaman->status == 'diambil' ? 'selected' : '' }}>
                                    Diambil</option>
                                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>
                                    Dikembalikan</option>
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
                            <a onclick="window.history.back()" class="btn btn-secondary text-white">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
