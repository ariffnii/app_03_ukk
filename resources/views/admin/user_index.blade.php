@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
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
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</button>
                        </form>
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
