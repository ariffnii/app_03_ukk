@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Koleksi Buku</div>
        <div class="card-body">
            <a href="{{ route('user.beranda') }}" class="btn btn-primary">Tambah</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Buku</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($koleksi as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->buku->judul }}</td>
                            <td class="text-center">
                                <a href="{{ route('peminjaman.user.create.form', $item->id_buku) }}"
                                    class="btn btn-primary">
                                    <i class="bi bi-plus"></i>
                                    Pinjam</a>
                                <a href="{{ route('koleksi.destroy', $item->id) }}" data-confirm-delete="true"
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
            </div>
        </div>
    </div>
    </div>
@endsection
