<?php

use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\ProfileController;
use App\Http\Controllers\Owner\LaporanBeliController;
use App\Http\Controllers\Owner\LaporanJualController;
use App\Http\Controllers\Owner\OwnerController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:owner')->prefix('owner')->name('owner.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth:owner'])->prefix('owner')->name('owner.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'], function () {
        return view('owner.dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
