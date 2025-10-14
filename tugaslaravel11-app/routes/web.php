<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuMakananController;

// ✅ Route default ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// ✅ Route ke halaman home (menampilkan daftar buku + pesan)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ✅ Route untuk menampilkan form tambah pesan
Route::get('/form', [HomeController::class, 'create'])->name('form');

// ✅ Route untuk mengirim data pesan dari form (pakai method POST)
Route::post('/form', [HomeController::class, 'store'])->name('storeMessage');
Route::get('/menu', [MenuMakananController::class, 'index']);
Route::get('/menu/create', [MenuMakananController::class, 'create']);
Route::post('/menu', [MenuMakananController::class, 'store']);
Route::get('/menu/{id}/edit', [MenuMakananController::class, 'edit']);
Route::put('/menu/{id}', [MenuMakananController::class, 'update']);
Route::delete('/menu/{id}', [MenuMakananController::class, 'destroy']);