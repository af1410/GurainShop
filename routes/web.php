<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanBeliController;
use App\Http\Controllers\LaporanJualController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


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
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/owner-auth.php';
