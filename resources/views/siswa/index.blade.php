@extends('layouts.app')
@section('title', 'Data Siswa')

@section('content')
    <div class="card">
        <div class="card-body">
        </div>
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Data Siswa</h2>
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id ="example" class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr> 
                            <th style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th class="text-end" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswaList as $index => $siswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->email }}</td>
                                <td>{{ $siswa->tanggal_lahir }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>
                                    @if ($siswa->foto)
                                        <img src="{{ asset('storage/' . $siswa->foto) }}" width="60" height="60">
                                    @else
                                        Tidak ada foto
                                    @endif
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('siswa.edit', $siswa) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('siswa.destroy', $siswa) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item text-danger" type="submit">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data siswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection