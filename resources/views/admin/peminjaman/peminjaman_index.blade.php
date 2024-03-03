@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID Peminjaman</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center">{{ $item->user->name }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">
                                @csrf
                                <a href="{{ route('peminjaman.show', $item->id) }}" class="btn btn-info">
                                    <i class="bi bi-eye"></i>
                                    Detail</a>
                                <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit</a>
                                <a href="{{ route('peminjaman.destroy', $item->id) }}" data-confirm-delete="true" class="btn btn-danger">
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
@endsection
