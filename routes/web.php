<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/peminjam', function () {
//     return view('peminjam.index');
// });

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.kategori');
});

Route::resource('/dashboard', BukuController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/peminjaman', PeminjamanController::class);
Route::resource('/admin', UserController::class);
Route::resource('/ulasan', UlasanController::class);
Route::resource('/koleksi', KoleksiController::class);
Route::resource('/petugas', PetugasController::class);


// Route::get('/kategori/{id}',[KategoriController::class, 'edit'] );

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginRegisterController::class, 'authenticate'])->name('login.store');
    Route::post('/register', [LoginRegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::get('/kumpulan', function () {
    return view('layouts.kumpulan');
});
Route::get('/cetak-peminjaman', [PeminjamanController::class, 'export_peminjaman'])->name('cetakpeminjaman');
