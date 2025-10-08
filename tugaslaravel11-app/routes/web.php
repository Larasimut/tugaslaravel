<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
