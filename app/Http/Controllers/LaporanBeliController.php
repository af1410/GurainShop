<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class LaporanBeliController extends Controller
{
    public function index()
    {
        return view('laporanbeli.index');
    }

    public function laporanHarian(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $pembelianHarian = Pembelian::whereDate('created_at', $tanggal)->with('detailPembelian.barang')->get();

        return view('laporanbeli.harian', compact('pembelianHarian', 'tanggal'));
    }

    public function laporanMingguan(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Ambil data pembelian berdasarkan rentang tanggal
        $pembelians = Pembelian::with('detailPembelian.barang')
            ->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])
            ->get();

        return view('laporanbeli.mingguan', compact('pembelians', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function laporanBulanan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Ambil data pembelian berdasarkan bulan dan tahun
        $pembelians = Pembelian::with('detailPembelian.barang')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();

        return view('laporanbeli.bulanan', compact('pembelians', 'bulan', 'tahun'));
    }
}
