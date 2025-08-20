@extends('template.layout')
@section('title', 'Data User')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Data User</h2>
                <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah User</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            {{-- <th>Role</th> --}}
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>{{ $user->role }}</td> --}}
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
