@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Data Peminjaman</div>
        <div class="card-body">
            <a href="{{ route('user.beranda') }}" class="btn btn-primary">Tambah</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Peminjaman</th>
                        <th class="text-center">Tangal Pengembalian</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($upinjam as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->tgl_pinjam }}</td>
                            <td class="text-center">{{ $item->tgl_kembali }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('peminjaman.user.show', $item->id) }}" class="btn btn-info">
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
            </div>
        </div>
    </div>
@endsection
