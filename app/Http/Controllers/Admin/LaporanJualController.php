<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanJualController extends Controller
{
    public function index()
    {
        return view('admin.laporanjual.index');
    }

    public function laporanHarian(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $penjualanHarian = Penjualan::whereDate('created_at', $tanggal)->with('detailPenjualan.barang')->get();

        return view('admin.laporanjual.harian', compact('penjualanHarian', 'tanggal'));
    }

    public function laporanMingguan(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Ambil data penjualan berdasarkan rentang tanggal
        $penjualans = Penjualan::with('detailPenjualan.barang')
            ->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])
            ->get();

        return view('admin.laporanjual.mingguan', compact('penjualans', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function laporanBulanan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Ambil data penjualan berdasarkan bulan dan tahun
        $penjualans = Penjualan::with('detailPenjualan.barang')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();

        return view('admin.laporanjual.bulanan', compact('penjualans', 'bulan', 'tahun'));
    }
}
