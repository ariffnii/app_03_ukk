@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Data Buku</div>
                <div class="card-body">
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">judul</th>
                                <th class="text-center">deskripsi</th>
                                <th class="text-center">stock</th>
                                <th class="text-center">Cover</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse ($buku as $item)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->judul }}</td>
                    <td class="text-center">{{ $item->deskripsi }}</td>
                    <td class="text-center">{{ $item->stock }}</td>
                    <td class="text-center"><img src="{{ asset('sneat/assets/img/buku/' . $item->cover) }}" alt="" width="100"></td>
                    <td class="text-center">
                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('buku.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                    @empty
                    data tidak ada
                    {{ $buku->links() }}
                    @endforelse
                </tbody>
            </table>
                </div>
            </div>
@endsection

