@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Data User</div>
        <div class="card-body">
            <div class="d-flex justify-content-start mb-3 gap-3">
                <a href="{{ route('ofc.export.user') }}" class="btn btn-sm btn btn-success"><i
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
                                <a href="{{ route('peminjam-ofc.show', $item->id) }}" class="btn btn-sm btn btn-info">
                                    <i class="bi bi-eye"></i>
                                    Detail</a>
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
