<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;  // << ini harus ada supaya bisa pakai factory()

    // Kalau perlu, isi properti fillable atau guarded di sini
    protected $table = 'siswa';
    protected $fillable = ['nama', 'email', 'tanggal_lahir', 'alamat','kelas','foto'];
}
