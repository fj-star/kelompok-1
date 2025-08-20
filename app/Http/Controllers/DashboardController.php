<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dashboard contoh: hitung jumlah siswa
        $jumlahSiswa = Siswa::count();

        return view('dashboard.index', compact('jumlahSiswa'));
    }
}
