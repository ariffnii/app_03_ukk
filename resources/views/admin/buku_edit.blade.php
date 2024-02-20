@extends('layouts.app')
@section('content')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Buku</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="judul">Judul</label>
            <div class="col-sm-10">
              <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" id="judul" placeholder="">
            </div>
            @error('judul')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="penulis">Penulis</label>
            <div class="col-sm-10">
              <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" id="penulis" placeholder="">
            </div>
            @error('penulis')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="penerbit">Penerbit</label>
            <div class="col-sm-10">
              <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" id="penerbit" placeholder="">
            </div>
            @error('penerbit')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="tahun">Tahun Terbit</label>
            <div class="col-sm-10">
              <input type="text" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" id="tahun" placeholder="">
            </div>
            @error('tahun_terbit')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="cover">Cover</label>
            <div class="col-sm-10">
              <input type="file" name="cover" id="cover" class="form-control" value="{{ old('cover', $buku->cover) }}">
              <img src="{{ asset('storage/cover_book/'.$buku->cover) }}" alt="" width="100px" height="100px">
            </div>
            @error('cover')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $buku->deskripsi) }}" id="deskripsi" placeholder="">
            </div>
            @error('deskripsi')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
            <div class="col-sm-10">
                <select id="kategori" name="kategori" class="form-select form-control">
                    <option>Fiksi/Non Fiksi</option>
                    <option value="fiksi" {{ $buku->kategori == 'fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="non_fiksi" {{ $buku->kategori == 'non_fiksi' ? 'selected' : '' }}>Non Fiksi</option>
                </select>
            </div>
            @error('kategori')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="stock">Stock</label>
            <div class="col-sm-10">
              <input type="number" name="stock" class="form-control" value="{{ old('stock', $buku->stock) }}" id="stock" placeholder="">
            </div>
            @error('stock')
                <div class="alert alert-danger mt-2">
                     {{ $message }}
                </div>
            @enderror
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <a href="{{ route('buku.index') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
