@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    @forelse ($dataPegawai as $item)
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">judul</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">stock</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->alamat }}</td>
                  </tr>
                    @empty
                    data tidak ada
                    {{ $dataPegawai->links() }}
                </tbody>
            </table>
            @endforelse
        </div>
    </div>
@endsection
