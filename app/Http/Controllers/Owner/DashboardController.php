<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Suplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenjualan = Penjualan::sum('total_bayar');
        $totalPelanggan = Pelanggan::count();
        $totalBarang = Barang::count();
        $recentPenjualans = Penjualan::with('pelanggan')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();


        $totalPembelian = Pembelian::sum('total_bayar');
        $totalSuplier = Suplier::count();
        $recentPembelians = Pembelian::with('suplier')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        return view('owner.dashboard', compact('totalPenjualan', 'totalPelanggan', 'totalBarang', 'recentPenjualans', 'totalPembelian', 'totalSuplier', 'recentPembelians'));
    }
}
