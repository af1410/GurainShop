<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Admin\LaporanBeliController;
use App\Http\Controllers\Admin\LaporanJualController;
use App\Http\Controllers\Admin\OwnerController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'], function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');

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

    //Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/print', [AdminController::class, 'print'])->name('admin.print');

    //penjualan
    Route::resource('penjualan', PenjualanController::class);
    Route::get('/penjualan/{id}/detail', [PenjualanController::class, 'detail'])->name('penjualan.detail');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');


    //pembelian
    Route::resource('pembelian', PembelianController::class);
    Route::get('/pembelian/{id}/detail', [PembelianController::class, 'detail'])->name('pembelian.detail');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');

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

    //Owner
    Route::get('/owner', [OwnerController::class, 'index'])->name('owner.index');
    Route::get('/owner/create', [OwnerController::class, 'create'])->name('owner.create');
    Route::post('/owner/store', [OwnerController::class, 'store'])->name('owner.store');
    Route::get('/owner/{id}/edit', [OwnerController::class, 'edit'])->name('owner.edit');
    Route::put('/owner/{id}/update', [OwnerController::class, 'update'])->name('owner.update');
    Route::delete('/owner/{id}/delete', [OwnerController::class, 'destroy'])->name('owner.destroy');
    Route::get('/owner/print', [OwnerController::class, 'print'])->name('owner.print');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
