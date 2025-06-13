<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\User;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('detailPenjualan', 'user', 'pelanggan')
            ->whereYear('tanggal', 2025)
            ->orderBy('created_at', 'desc')  // Mengurutkan dari yang terbaru
            ->get();

        return view('penjualan.index', compact('penjualans'));
    }


    public function create()
    {
        $pelanggans = Pelanggan::all();
        $barangs = Barang::all();
        $users = User::all();
        return view('penjualan.create', compact('pelanggans', 'barangs', 'users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'total_bayar' => 'required|numeric',
            'dibayar' => 'required|numeric',
            'kembali' => 'required|numeric',
            'total_keuntungan' => 'required|numeric',
            'barang.*.jumlah' => 'required|integer|min:0',
        ]);

        // Buat format ID Penjualan: Btanggalbulantahun + nomor urut
        $tanggalSekarang = now()->format('dmy');
        $prefix = 'J' . $tanggalSekarang;

        // Cari nomor urut terakhir dari hari yang sama
        $nomorUrut = Penjualan::whereDate('tanggal', now())->count() + 1;
        $id_penjualan = $prefix . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

        // Simpan penjualan
        $penjualan = Penjualan::create([
            'id_penjualan' => $id_penjualan,
            'id_user' => $request->id_user,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal' => now(),
            'total_bayar' => $request->total_bayar,
            'dibayar' => $request->dibayar,
            'kembali' => $request->kembali,
            'total_keuntungan' => $request->total_keuntungan,

        ]);

        $id_penjualan = $penjualan->id_penjualan;

        // Simpan detail penjualan dan update stok barang
        foreach ($request->barang as $id_barang => $detail) {
            if ($detail['jumlah'] > 0) { // Hanya simpan jika jumlah barang lebih dari 0
                $barang = Barang::find($id_barang);

                // Cek apakah barang ditemukan
                if (!$barang) {
                    return redirect()->back()->withErrors('Barang tidak ditemukan!');
                }

                DetailPenjualan::create([
                    'id_penjualan' => $id_penjualan,
                    'id_barang' => $id_barang,
                    'jumlah' => $detail['jumlah'],
                    'harga' => $barang->hargajual,
                    'keuntungan' =>  $barang->keuntungan
                ]);

                // Update stok barang (stok berkurang)
                $barang->jumlahbarang -= $detail['jumlah'];
                $barang->save();
            }
        }

        if ($request->has('cetak_nota')) {
            return response()->json([
                'id_penjualan' => $id_penjualan,  // Kirim id_penjualan ke frontend
            ]);
        }

        // Redirect setelah loop selesai
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil disimpan!');
    }




    public function detail($id)
    {
        $penjualan = Penjualan::with('detailPenjualan.barang')->findOrFail($id);

        return view('penjualan.detail', compact('penjualan'));
    }
}
