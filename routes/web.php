<?php

use App\Http\Controllers\LoginRegisterController;
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

Route::get('/peminjam', function () {
    return view('peminjam.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/petugas', function () {
    return view('petugas.index');
});
// Route::get('/kategori/{id}',[KategoriController::class, 'edit'] );

Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/login',[LoginRegisterController::class, 'authenticate'] )->name('login.store');
Route::post('/register', [LoginRegisterController::class, 'store'])->name('register.store');


Route::get('/kumpulan', function () {
    return view('layouts.kumpulan');
});
