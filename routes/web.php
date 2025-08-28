<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\Siswa;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard1', function () {
    return view('template.layout');
})->middleware(['auth', 'verified'])->name('dashboard1');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/debug/siswa', function () {
    return Siswa::all();
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', function () {
    return view('index');
});
 
Route::get('layout',function(){
    return view('template.layout');
});
Route::get('dashboard1',function(){
    return view('template.dashboard1');
});

// Route::get('hello',function(){
//     return 'hello dedeng';
// });

Route::get('/user/{id}', function ($id)  {
    return "User ID: " . $id;
});

//ajax
// Route::get('/siswa/datatables', [SiswaController::class, 'data'])->name('siswa.data');
Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mapel', MapelController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('siswa', SiswaController::class);

//grouping admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
});

//grouping users
Route::prefix('users')->group(function () {
    Route::get('/index', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    // Route::resource('user', UserController::class);
});
// Route::resource('user', UserController::class);

Route::get('mengajar',function(){
    return view('mengajar.indexM'); 
});

Route::get('nilai',function(){
    return view('nilai.indexN');
});

require __DIR__.'/auth.php';
