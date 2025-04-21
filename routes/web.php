<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.beranda');
});

Route::get('/pengguna', function () {
    return view('admin.pengguna');
});
Route::get('/ulasan', function () {
    return view('admin.ulasan');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/kategori', function () {
    return view('admin.kategori.kategori');
});
Route::get('/produk', function () {
    return view('admin.produk.produk');
});
