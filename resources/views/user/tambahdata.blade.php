@extends('template.layout')
@section('title','tambahdata')
@section('content')
<div class="card">
  <div class="card-body">
    <h1>Tambah User Baru</h1>
   
       @if(session('success'))
           <p style="color: green;">{{ session('success') }}</p>
       @endif
   
       @if($errors->any())
           <div style="color: red;">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
   
       <form action="{{ route('user.store') }}" method="POST">
           @csrf
           <label>Nama:</label><br>
           <input type="text" name="name" class="form-control" value="{{ old('name') }}"><br><br>
   
           <label>Email:</label><br>
           <input type="email" name="email" class="form-control"  value="{{ old('email') }}"><br><br>
   
           <label>Password:</label><br>
           <input type="password" class="form-control" name="password" ><br><br>
   
           <label>Konfirmasi Password:</label><br>
           <input type="password" class="form-control" name="password_confirmation"><br><br>
   
           <button type="submit"  class="btn btn-primary">Simpan</button>
       </form>

  </div>
</div>
@endsection()