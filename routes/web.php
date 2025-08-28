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
use App\Http\Controllers\AuthController;
use App\Models\Siswa;

// === AUTH ROUTES ===
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name( 'register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// === DASHBOARD ===
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('login')
    ->name('dashboard');

// === HALAMAN UTAMA ===
Route::get('/', function () {
    return view('welcome');
});

// === DEBUG ROUTE ===
Route::get('/debug/siswa', function () {
    return Siswa::all();
});

// === TEMPLATE ROUTES ===
Route::get('index', function () {
    return view('index');
});
Route::get('layout', function () {
    return view('template.layout');
});
Route::get('template-dashboard', function () {
    return view('template.dashboard1');
});

// === RESOURCE ROUTES ===
Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mapel', MapelController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('siswa', SiswaController::class);

// === GROUPING ADMIN ===
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
});

// === GROUPING USERS ===
Route::prefix('users')->group(function () {
    Route::get('/index', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

// === HALAMAN TAMBAHAN ===
Route::get('mengajar', function () {
    return view('mengajar.indexM');
});
Route::get('nilai', function () {
    return view('nilai.indexN');
});
