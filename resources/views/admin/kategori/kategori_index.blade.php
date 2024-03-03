@extends('layouts.app')

@section('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="card">
        <div class="card-header">Data Kategori</div>
        <div class="card-body">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nm_kategori }}</td>
                            <td class="text-center">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit</a>
                                <a href="{{ route('kategori.destroy', $item->id) }}" data-confirm-delete="true"
                                    class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                    Delete</a>
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
                {{ $kategori->links() }}
            </div>
        </div>
    </div>
@endsection
