@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Data Ulasan Buku</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Buku</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ulasan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->buku->judul }}</td>
                            <td class="text-center">{{ $item->user->name }}</td>
                            <td class="text-center">{{ $item->rating }}</td>
                            <td class="text-center">
                                <a href="{{ route('ulasan.show', $item->id) }}" class="btn btn-sm btn btn-info">
                                    <i class="bi bi-eye"></i>
                                    Detail</a>
                                <a href="{{ route('ulasan.destroy', $item->id) }}" data-confirm-delete="true"
                                    class="btn btn-sm btn btn-danger">
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
                {{ $ulasan->links() }}
            </div>
        </div>
    </div>
@endsection
