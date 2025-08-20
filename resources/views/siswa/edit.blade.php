@extends('template.layout')
@section('title', 'Edit Siswa')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Siswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $siswa->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat', $siswa->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                    @if ($siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" width="100" class="mt-2">
                    @else
                        <p class="mt-2">Tidak ada foto</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
    