@extends('template.layout')
@section('title', 'Detail User')

@section('content')
<div class="card w-50 mx-auto mt-4">
    <div class="card-header">
        <h4>Detail User</h4>
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Dibuat pada:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
