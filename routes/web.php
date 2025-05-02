<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

//route untuk auth
Route::view('/login', 'auth.login')
    ->middleware('guest');

Route::view('/register', 'auth.register');

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

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');

    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('admin.produk.index');

    Route::get('/admin/detail_pemesanan', [DetailPemesananController::class, 'index'])->name('admin.detail_pemesanan.index');

    Route::get('/admin/pemesanan', [PemesananController::class, 'index'])->name('admin.pemesanan.index');

    Route::get('/admin/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran.index');



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
    Route::get('/admin/pengiriman', function () {
        return view('admin.transaksi.pengiriman.pengiriman');
    });

    Route::get('/admin/pengiriman/create', function () {
        return view('admin.transaksi.pengiriman.create');
    });

    Route::get('/admin/transaksi/pengiriman/edit', function () {
        return view('admin.transaksi.pengiriman.edit');
    });

    // route untuk admin ulasan
    Route::get('/admin/ulasan', function () {
        return view('admin.ulasan.ulasan');
    });

    Route::get('/admin/ulasan/create', function () {
        return view('admin.ulasan.create');
    });

    Route::get('/admin/ulasan/edit', function () {
        return view('admin.ulasan.edit');
    });
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
