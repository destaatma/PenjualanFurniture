<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\FronandController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPemesananController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UlasanprodukController;
use App\Http\Controllers\UserController;
use App\Models\DetailPemesanan;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\Produk;
use App\Models\User;
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

//route forgot password
Auth::routes(['verify' => true]);

//route user
// Route::get('/', function () {
//     return view('welcome');
// });->middleware(['auth'])->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');


Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.beranda');
    });
    Route::get('/admin', [BerandaController::class, 'index'])->name('admin.beranda.index');

    Route::resource('admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

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


//route untuk user tentang kami
Route::get('/tentangKami', function () {
    return view('tentangKami');
});

//route untuk user produk
Route::get('/produk', [FronandController::class, 'produk'])->name('produk');


//route untuk user detail
Route::get('/produk/{id}', [FronandController::class, 'show'])->name('produk.show');

//route untuk ulasan user
Route::post('/ulasans', [UlasanprodukController::class, 'store'])->name('ulasans.store');
Route::get('/ulasans/{id}', [FronandController::class, 'show'])->name('ulasans.show');

//route untuk user pembelian
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambahKeKeranjang'])->name('keranjang.tambah');
Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

//Route::post('/bayar-langsung', [PaymentController::class, 'directBuy'])->name('payment.directBuy');
Route::post('/bayar-langsung', [PaymentController::class, 'directBuy'])->name('bayar-langsung');

Route::post('/payment/pay', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::post('/payment/notification', [PaymentController::class, 'handleNotification']);

//route untuk user pemesanan
Route::get('/caraPemesanan', function () {
    return view('caraPemesanan');
});

//route untuk grafik
Route::get('/chart-penjualan', [BerandaController::class, 'chartPenjualan'])->name('chart.penjualan');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//route unutk profil
Route::get('/profil', [ProfileController::class, 'show'])->name('profil.show');
Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
Route::put('/profil', [ProfileController::class, 'update'])->name('profil.update');

//route riwatar pemesanan
Route::get('/pesanan-saya', [RiwayatPemesananController::class, 'index'])->name('pesanan.riwayat');
Route::get('/pesanan-saya/{id}', [RiwayatPemesananController::class, 'show'])->name('detailpesanan');

Route::get('pembayaran/export', [PembayaranController::class, 'export'])->name('pembayaran.export');
