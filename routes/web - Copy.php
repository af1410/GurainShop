<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanJualController;
use App\Http\Controllers\LaporanBeliController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk dashboard admin
Route::middleware([CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard')->name('dashboard');
    });
});

// Route untuk dashboard kasir
Route::middleware([CheckRole::class . ':kasir'])->group(function () {
    Route::get('/kasir/dashboard', function () {
        return view('kasir.dashboard')->name('dashboard');
    });
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Barang 

    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id_barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id_barang}/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id_barang}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/print', [BarangController::class, 'print'])->name('barang.print');


    //User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/print', [UserController::class, 'print'])->name('user.print');

    //Suplier
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier.index');
    Route::get('/suplier/create', [SuplierController::class, 'create'])->name('suplier.create');
    Route::post('/suplier/store', [SuplierController::class, 'store'])->name('suplier.store');
    Route::get('/suplier/{id_suplier}/edit', [SuplierController::class, 'edit'])->name('suplier.edit');
    Route::put('/suplier/{id_suplier}', [SuplierController::class, 'update'])->name('suplier.update');
    Route::delete('/suplier/{id_suplier}', [SuplierController::class, 'destroy'])->name('suplier.destroy');
    Route::get('/suplier/print', [SuplierController::class, 'print'])->name('suplier.print');

    //Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{id_pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{id_pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id_pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    Route::get('/pelanggan/print', [PelangganController::class, 'print'])->name('pelanggan.print');

    //penjualan
    Route::resource('penjualan', PenjualanController::class);
    Route::get('/penjualan/{id}/detail', [PenjualanController::class, 'detail'])->name('penjualan.detail');


    //pembelian
    Route::resource('pembelian', PembelianController::class);
    Route::get('/pembelian/{id}/detail', [PembelianController::class, 'detail'])->name('pembelian.detail');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    //Laporan Penjualan
    Route::get('/laporanjual', [LaporanJualController::class, 'index'])->name('laporanjual.index');
    Route::post('/laporanjual/harian', [LaporanJualController::class, 'laporanHarian'])->name('laporanjual.harian');
    Route::post('/laporanjual/mingguan', [LaporanJualController::class, 'laporanMingguan'])->name('laporanjual.mingguan');
    Route::post('/laporanjual/bulanan', [LaporanJualController::class, 'laporanBulanan'])->name('laporanjual.bulanan');

    //Laporan Pembelian
    Route::get('/laporanbeli', [LaporanBeliController::class, 'index'])->name('laporanbeli.index');
    Route::post('/laporanbeli/harian', [LaporanBeliController::class, 'laporanHarian'])->name('laporanbeli.harian');
    Route::post('/laporanbeli/mingguan', [LaporanBeliController::class, 'laporanMingguan'])->name('laporanbeli.mingguan');
    Route::post('/laporanbeli/bulanan', [LaporanBeliController::class, 'laporanBulanan'])->name('laporanbeli.bulanan');
});
require __DIR__ . '/auth.php';
