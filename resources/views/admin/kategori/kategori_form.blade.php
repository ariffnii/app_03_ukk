@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Kategori</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('kategori.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="stock">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" name="nm_kategori" class="form-control" id="stock" placeholder="">
                        </div>
                        @error('nm_kategori')
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
