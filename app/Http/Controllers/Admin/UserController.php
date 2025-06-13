<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        // Generate kode_kasir otomatis
        $lastUser = User::orderBy('kode_kasir', 'desc')->first();
        if ($lastUser) {
            $lastKode = (int)substr($lastUser->kode_kasir, 3); // Mengambil angka terakhir dari kode_kasir
            $newKode = 'KSR' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format KSRxxx
        } else {
            $newKode = 'KSR001'; // Jika tidak ada data, mulai dari KSR001
        }

        // Simpan data user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kode_kasir' => $newKode, // Menyimpan kode_kasir yang baru
        ]);

        return redirect()->route('user.index')->with('success', 'Kasir berhasil ditambahkan.');
    }

    public function str(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function print()
    {
        $users = User::all();
        return view('user.print', compact('users'));
    }
}
