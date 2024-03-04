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
                        <th class="text-center">penulis</th>
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
                            <td class="text-center">{{ $item->penulis }}</td>
                            <td class="text-center">{{ $item->stock }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="" width="100px"
                                    height="100px">
                            </td>
                            <td class="text-center">
                                <form action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('buku.show', $item->id) }}" class="btn btn-sm btn btn-info">
                                        <i class="bi bi-eye"></i>
                                        Detail</a>
                                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit</a>
                                    <button type="submit" data-confirm-delete="true" class="btn btn-sm btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                        Delete</button>
                                </form>
                            </td>
                        @empty
                            <td colspan="6">
                                data tidak ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                {{ $buku->links() }}
            </div>
        </div>
    </div>
@endsection
