<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/admin/kategori', function () {
    return view('admin.kategori.kategori');
});

Route::get('/admin/produk', function () {
    return view('admin.produk.produk');
});

Route::get('/admin/pemesanan', function () {
    return view('admin.transaksi.pemesanan');
});

Route::get('/admin/pembayaran', function () {
    return view('admin.transaksi.pembayaran');
});

Route::get('/admin/pengiriman', function () {
    return view('admin.transaksi.pengiriman');
});

//route untuk user tentang kami
Route::get('/tentangKami', function () {
    return view('tentangKami');
});
//route untuk user produk
Route::get('/produk', function () {
    return view('produk');
});
//route untuk user kategori
Route::get('/kategori', function () {
    return view('kategori');
});
//route untuk user pemesanan
Route::get('/pemesanan', function () {
    return view('pemesanan');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
