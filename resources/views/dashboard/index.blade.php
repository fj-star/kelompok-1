@extends('template.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <h1>Selamat Datang di Dashboard</h1>
    <div class="alert alert-info">
        Total Siswa: <strong>{{ $jumlahSiswa }}</strong>
    </div>
</div>
@endsection
