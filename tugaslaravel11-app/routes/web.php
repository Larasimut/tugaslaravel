<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route default ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route ke halaman home
Route::get('/home', [HomeController::class, 'index']);
