<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('admin.owner.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $lastUser = Owner::orderBy('kode_owner', 'desc')->first();
        if ($lastUser) {
            $lastKode = (int)substr($lastUser->kode_owner, 3);
            $newKode = 'OWN' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'OWN001';
        }

        // Simpan data user
        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kode_owner' => $newKode, // Menyimpan kode_kasir yang baru
        ]);

        return redirect()->route('admin.owner.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function str(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'password' => 'required',
            'role' => 'required'
        ]);

        Owner::create($request->all());

        return redirect()->route('admin.owner.index')->with('success', 'Owner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('admin.owner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners,email,' . $id,
        ]);

        $owner = Owner::findOrFail($id);
        $owner->update($request->all());

        return redirect()->route('admin.owner.index')->with('success', 'Owner berhasil diupdate.');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('admin.owner.index')->with('success', 'Owner berhasil dihapus.');
    }

    public function print()
    {
        $owners = Owner::all();
        return view('admin.owner.print', compact('owners'));
    }
}
