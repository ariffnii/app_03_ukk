@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Data Buku</div>
        <div class="card-body">
            <div class="d-flex justify-content-start mb-3 gap-3">
                <a href="{{ route('ofc.export.buku') }}" class="btn btn-sm btn btn-success"><i
                        class="bi bi-file-earmark-spreadsheet"></i>Export</a>
            </div>
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
                                <a href="{{ route('buku-ofc.show', $item->id) }}" class="btn btn-sm btn btn-info">
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
                {{ $buku->links() }}
            </div>
        </div>
    </div>
@endsection
