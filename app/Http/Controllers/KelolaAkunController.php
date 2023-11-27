<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaAkunController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules.kelola_akun.index', compact('users'));
    }

    public function create()
    {
        // form tambah akun
        return view('modules.kelola_akun.create');
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nama_siswa' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nis' => 'nullable|exists:siswa,nis',
        ]);

        // TOLONG KERJASAMANYA ajg ajg ajg
        User::create([
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nis' => $request->nis,
        ]);

        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        // tampilin form edit akun
        return view('modules.kelola_akun.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // validasi
        $request->validate([
            'nama_siswa' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|min:6',
            'nis' => 'nullable|exists:siswa,nis',
        ]);

        // update akun
        $user->update([
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'nis' => $request->nis,
        ]);

        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        // delete akun
        $user->delete();
        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil dihapus');
    }
}
