@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Data User</div>
        <div class="card-body">
            <div class="d-flex justify-content-start mb-3 gap-3">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn btn-primary"><i class="bi bi-plus"></i>Tambah</a>
                <a href="{{ route('admin.export.user') }}" class="btn btn-sm btn btn-success"><i
                        class="bi bi-file-earmark-spreadsheet"></i>Export</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telephone</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataUser as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-center">{{ $item->telepon }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit</a>
                                <a href="{{ route('user.destroy', $item->id) }}" data-confirm-delete="true"
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
                {{ $dataUser->links() }}
            </div>
        </div>
    </div>
@endsection
