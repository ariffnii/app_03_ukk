@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID Peminjaman</th>
                        <th class="text-center">Id Struk</th>
                        <th class="text-center">Id Peminjaman</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($struk as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->id_struk }}</td>
                            <td class="text-center">{{ $item->id_peminjaman }}</td>
                            <td class="text-center">
                                @csrf
                                <a href="{{ route('struk-admin.show', $item->id_struk) }}" class="btn btn-sm btn btn-info">
                                    <i class="bi bi-eye"></i>
                                    Detail</a>
                                <a href="{{ route('struk-admin.destroy', $item->id_struk) }}" data-confirm-delete="true" class="btn btn-sm btn btn-danger">
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
