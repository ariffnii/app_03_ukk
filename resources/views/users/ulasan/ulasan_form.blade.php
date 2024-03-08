@extends('layouts.app')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Ulasan</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('ulasan.store', $buku->id) }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <input type="text" name="user_id" class="form-control" value="{{ $user->id }}" hidden>
                    <input type="text" name="buku_id" class="form-control" value="{{ $buku->id }}" hidden>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Judul Buku</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label" for="judul">{{ $buku->judul }}</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul">Ulasan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="komentar" id="floatingTextarea"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="1" value="1">
                                <label class="form-check-label" for="1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="2" value="2">
                                <label class="form-check-label" for="2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="3" value="3">
                                <label class="form-check-label" for="3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="4" value="4">
                                <label class="form-check-label" for="4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="5" value="5">
                                <label class="form-check-label" for="5">5</label>
                            </div>
                        </div>
                        @error('rating')
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
