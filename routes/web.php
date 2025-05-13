<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use App\Models\DetailPemesanan;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });

//route untuk auth

// Route::post('/register', [RegisterController::class, 'register'])
//     ->middleware('guest')
//     ->name('register');

// Route::view('/register', 'auth.register');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('index');
Route::post('/register', [AuthController::class, 'store']);

Route::view('/login', 'auth.login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->middleware('guest')
    ->name('login');

Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        return view('admin.beranda');
    });

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

    Route::resource('admin/kategori', KategoriController::class)->names([
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'show' => 'admin.kategori.show',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy',
    ]);

    Route::resource('admin/produk', ProdukController::class)->names([
        'index' => 'admin.produk.index',
        'create' => 'admin.produk.create',
        'store' => 'admin.produk.store',
        'show' => 'admin.produk.show',
        'edit' => 'admin.produk.edit',
        'update' => 'admin.produk.update',
        'destroy' => 'admin.produk.destroy',
    ]);

    Route::resource('admin/detail_pemesanan', controller: DetailPemesananController::class)->names([
        'index' => 'admin.transaksi.detail_pemesanan.index',
        'create' => 'admin.transaksi.detail_pemesanan.create',
        'store' => 'admin.transaksi.detail_pemesanan.store',
        'show' => 'admin.transaksi.detail_pemesanan.show',
        'edit' => 'admin.transaksi.detail_pemesanan.edit',
        'update' => 'admin.transaksi.detail_pemesanan.update',
        'destroy' => 'admin.transaksi.detail_pemesanan.destroy',
    ]);

    Route::resource('admin/pemesanan', PemesananController::class)->names([
        'index' => 'admin.transaksi.pemesanan.index',
        'create' => 'admin.transaksi.pemesanan.create',
        'store' => 'admin.transaksi.pemesanan.store',
        'show' => 'admin.transaksi.pemesanan.show',
        'edit' => 'admin.transaksi.pemesanan.edit',
        'update' => 'admin.transaksi.pemesanan.update',
        'destroy' => 'admin.transaksi.pemesanan.destroy',
    ]);

    Route::resource('admin/pembayaran', PembayaranController::class)->names([
        'index' => 'admin.transaksi.pembayaran.index',
        'create' => 'admin.transaksi.pembayaran.create',
        'store' => 'admin.transaksi.pembayaran.store',
        'show' => 'admin.transaksi.pembayaran.show',
        'edit' => 'admin.transaksi.pembayaran.edit',
        'update' => 'admin.transaksi.pembayaran.update',
        'destroy' => 'admin.transaksi.pembayaran.destroy',
    ]);

    Route::resource('admin/pengiriman', PengirimanController::class)->names([
        'index' => 'admin.transaksi.pengiriman.index',
        'create' => 'admin.transaksi.pengiriman.create',
        'store' => 'admin.transaksi.pengiriman.store',
        'show' => 'admin.transaksi.pengiriman.show',
        'edit' => 'admin.transaksi.pengiriman.edit',
        'update' => 'admin.transaksi.pengiriman.update',
        'destroy' => 'admin.transaksi.pengiriman.destroy',
    ]);

    Route::resource('admin/ulasan', UlasanController::class)->names([
        'index' => 'admin.ulasan.index',
        'create' => 'admin.ulasan.create',
        'store' => 'admin.ulasan.store',
        'show' => 'admin.ulasan.show',
        'edit' => 'admin.ulasan.edit',
        'update' => 'admin.ulasan.update',
        'destroy' => 'admin.ulasan.destroy',
    ]);
});

// Route::get('/admin', DashboardController::class, 'index')->name('admin.dashboard');
//     Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

// route untuk admin kategori
// Route::get('/admin/kategori', function () {
//     return view('admin.kategori.kategori');
// });

// Route::get('/admin/kategori/create', function () {
//     return view('admin.kategori.create');
// });

// Route::get('/admin/kategori/edit', function () {
//     return view('admin.kategori.edit');
// });

// route untuk admin produk
// Route::get('/admin/produk', function () {
//     return view('admin.produk.produk');
// });

// Route::get('/admin/produk/create', function () {
//     return view('admin.produk.create');
// });

// Route::get('/admin/produk/edit', function () {
//     return view('admin.produk.edit');
// });

// route untuk admin detailpemesanan
// Route::get('/admin/detail_pemesanan', function () {
//     return view('admin.transaksi.detail_pemesanan.detail_pemesanan');
// });

// Route::get('/admin/transaksi/pemesanan/create', function () {
//     return view('admin.transaksi.pemesanan.create');
// });

// Route::get('/admin/transaksi/pemesanan/edit', function () {
//     return view('admin.transaksi.pemesanan.edit');
// });


// route untuk admin pemesanan
// Route::get('/admin/pemesanan', function () {
//     return view('admin.transaksi.pemesanan.pemesanan');
// });

// Route::get('/admin/transaksi/pemesanan/create', function () {
//     return view('admin.transaksi.pemesanan.create');
// });

// Route::get('/admin/transaksi/pemesanan/edit', function () {
//     return view('admin.transaksi.pemesanan.edit');
// });


// route untuk admin pembayaran
// Route::get('/admin/pembayaran', function () {
//     return view('admin.transaksi.pembayaran.pembayaran');
// });

// Route::get('/admin/transaksi/pembayaran/create', function () {
//     return view('admin.transaksi.pembayaran.create');
// });

// Route::get('/admin/transaksi/pembayaran/edit', function () {
//     return view('admin.transaksi.pembayaran.edit');
// });

// route untuk admin pengiriman

// route untuk admin ulasan
// Route::get('/admin/ulasan', function () {
//     return view('admin.ulasan.index');
// });

// Route::get('/admin/ulasan/create', function () {
//     return view('admin.ulasan.create');
// });

// Route::get('/admin/ulasan/edit', function () {
//     return view('admin.ulasan.edit');
// });





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
