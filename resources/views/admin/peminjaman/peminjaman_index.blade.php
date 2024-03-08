@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Data Peminjaman</div>
        <div class="card-body">
            <div class="d-flex justify-content-start mb-3 gap-3">
                <a href="{{ route('admin.export.peminjaman') }}" class="btn btn-sm btn btn-success"><i
                        class="bi bi-file-earmark-spreadsheet"></i>Export</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID Peminjaman</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Status</th>
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
                                @if ($item->status == 'dipinjam')
                                    <span class="badge bg-label-warning">dipinjam</span>
                                @endif
                                @if ($item->status == 'dikembalikan')
                                    <span class="badge bg-label-success">dikembalikan</span>
                                @endif
                                @if ($item->status == 'diambil')
                                    <span class="badge bg-label-info">diambil</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('peminjaman.show', $item->id) }}" class="btn btn-sm btn btn-info">
                                    <i class="bi bi-eye"></i>
                                    Detail</a>
                                <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit</a>
                                <a href="{{ route('peminjaman.destroy', $item->id) }}" data-confirm-delete="true"
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
                {{ $peminjaman->links() }}
            </div>
        </div>
    </div>
@endsection
