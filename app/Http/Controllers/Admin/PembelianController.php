<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Suplier;
use App\Models\Barang;
use App\Models\User;
use App\Models\Admin;
use App\Models\DetailPembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('detailPembelian', 'user', 'suplier')->whereYear('tanggal', 2025)->orderBy('tanggal', 'desc')->get();
        return view('admin.pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $supliers = Suplier::all();
        $barangs = Barang::all();
        $users = User::all();
        $admins = Admin::all();
        return view('admin.pembelian.create', compact('supliers', 'barangs', 'admins', 'users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_suplier' => 'required|exists:suplier,id_suplier',
            'total_bayar' => 'required|numeric',
            'dibayar' => 'required|numeric',
            'kembali' => 'required|numeric',
            'barang.*.jumlah' => 'required|integer|min:0',
        ]);

        // Buat format ID Pembelian: Btanggalbulantahun + nomor urut
        $tanggalSekarang = now()->format('dmy'); // Misalnya: 290924 untuk 29-09-2024
        $prefix = 'B' . $tanggalSekarang;

        // Cari nomor urut terakhir dari hari yang sama
        $nomorUrut = Pembelian::whereDate('tanggal', now())->count() + 1;
        $id_pembelian = $prefix . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT); // Contoh: B290924001

        // Simpan pembelian
        $pembelian = Pembelian::create([
            'id_pembelian' => $id_pembelian,
            'id_user' => $request->id_user,
            'id_suplier' => $request->id_suplier,
            'tanggal' => now(),
            'total_bayar' => $request->total_bayar,
            'dibayar' => $request->dibayar,
            'kembali' => $request->kembali,
        ]);

        $id_pembelian = $pembelian->id_pembelian;

        // Simpan detail pembelian dan update stok barang
        foreach ($request->barang as $id_barang => $detail) {
            if ($detail['jumlah'] > 0) { // Hanya simpan jika jumlah barang lebih dari 0
                $barang = Barang::find($id_barang);

                // Cek apakah barang ditemukan
                if (!$barang) {
                    return redirect()->back()->withErrors('Barang tidak ditemukan!');
                }

                DetailPembelian::create([
                    'id_pembelian' => $id_pembelian,
                    'id_barang' => $id_barang,
                    'jumlah' => $detail['jumlah'],
                    'harga' => $barang->hargabarang,
                ]);

                // Update stok barang (stok bertambah)
                $barang->jumlahbarang += $detail['jumlah'];
                $barang->save();
            }
        }

        if ($request->has('cetak_nota')) {
            return response()->json([
                'id_pembelian' => $id_pembelian,  // Kirim id_pembelian ke frontend
            ]);
        }


        // Pastikan redirect dilakukan setelah loop selesai
        return redirect()->route('admin.pembelian.index')->with('success', 'Pembelian berhasil disimpan!');
    }

    public function detail($id)
    {
        $pembelian = Pembelian::with('detailPembelian.barang')->findOrFail($id);

        return view('admin.pembelian.detail', compact('pembelian'));
    }
}
