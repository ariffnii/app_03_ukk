@extends('layouts.app')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Buku</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="">
            @csrf
          <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="judul" hidden>Id User</label>
            <div class="col-sm-10">
              <input type="text" name="id_buku" class="form-control" id="judul" value="{{ $upinjams->id }}" hidden>
            </div>
          </div>
          <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="judul" hidden>Id Buku</label>
            <div class="col-sm-10">
              <input type="text" name="id_buku" class="form-control" id="judul" value="{{ $upinjam->id }}" hidden>
            </div>
          </div>
          <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-form-label" for="judul">{{ $upinjam->judul }}</label>
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
            <label class="col-sm-2 col-form-label" for="penerbit">Tanggal Pengembalian</label>
            <div class="col-sm-10">
              <input type="date" name="tgl_kembali" class="form-control" id="penerbit" placeholder="">
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
