@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    @forelse ($dataPegawai as $item)
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center">{{ $item->telepon }}</td>
                    <td class="text-center">{{ $item->stock }}</td>
                  </tr>
                    @empty
                    data tidak ada
                    @endforelse
                </tbody>
            </table>
            {{ $dataPegawai->links() }}
        </div>
    </div>
@endsection
