<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $lastUser = Admin::orderBy('kode_admin', 'desc')->first();
        if ($lastUser) {
            $lastKode = (int)substr($lastUser->kode_admin, 3);
            $newKode = 'ADM' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newKode = 'ADM001';
        }

        // Simpan data user
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kode_admin' => $newKode, // Menyimpan kode_kasir yang baru
        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function str(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required',
            'role' => 'required'
        ]);

        Admin::create($request->all());

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($request->all());

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil diupdate.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil dihapus.');
    }

    public function print()
    {
        $admins = Admin::all();
        return view('admin.admin.print', compact('admins'));
    }
}
