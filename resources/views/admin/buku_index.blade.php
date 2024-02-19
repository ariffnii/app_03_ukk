@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @forelse ($buku as $item)
            <table class="table">
                <thead>
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
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->stock }}</td>
                  </tr>
                    @empty
                    data tidak ada
                </tbody>
            </table>
            {{ $buku->links() }}
            @endforelse
                </div>
            </div>
@endsection

