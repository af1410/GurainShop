<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapelanggan' => 'required|string|max:255',
            'alamatpelanggan' => 'required|string',
            'telppelanggan' => 'required',
            'email' => 'required|email',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan created successfully.');
    }

    public function edit($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id_pelanggan)
    {

        $request->validate([
            'namapelanggan' => 'required|string|max:255',
            'alamatpelanggan' => 'required|string',
            'telppelanggan' => 'required',
            'email' => 'required|email',
        ]);

        $pelanggan = Pelanggan::find($id_pelanggan);


        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully.');
    }


    public function destroy($id_pelanggan)
    {
        Log::info('Deleting pelanggan with ID: ' . $id_pelanggan);

        $pelanggan = Pelanggan::find($id_pelanggan);

        if (!$pelanggan) {
            Log::error('Pelanggan with ID ' . $id_pelanggan . ' not found.');
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan not found.');
        }

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan deleted successfully.');
    }

    public function print()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.print', compact('pelanggans'));
    }
}
