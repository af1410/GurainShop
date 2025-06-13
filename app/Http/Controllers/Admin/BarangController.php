<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namabarang' => 'required|string|max:255',
            'hargabarang' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'jumlahbarang' => 'required|integer',
            'satuanbarang' => 'required|string|max:255',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang created successfully.');
    }

    public function edit($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id_barang)
    {
        $request->validate([
            'namabarang' => 'required',
            'hargabarang' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'jumlahbarang' => 'required|integer',
            'satuanbarang' => 'required',
        ]);

        $barang = Barang::findOrFail($id_barang);
        $barang->namabarang = $request->namabarang;
        $barang->hargabarang = (int)$request->hargabarang;
        $barang->hargajual = (int)$request->hargajual;
        $barang->jumlahbarang = $request->jumlahbarang;
        $barang->satuanbarang = $request->satuanbarang;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang updated successfully.');
    }

    public function destroy($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully.');
    }

    public function print()
    {
        $barangs = Barang::all();
        return view('barang.print', compact('barangs'));
    }
}
