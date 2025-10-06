<?php

use Illuminate\Support\Facades\Route;

// Route default ke halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route ke halaman home
Route::get('/home', function () {
    return view('home');
});
