<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    public function index()
    {
        $akunList = User::all();
        return view('modules.kelola_akun.index', compact('akunList'));
    }

    public function create()
    {
        $siswaList = Siswa::all();
        return view('modules.kelola_akun.create', compact('siswaList'));
    }

    public function createProcess(Request $request)
    {
        $data = $request->validate([
            'nis' => 'required|string|nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $existingPengelola = User::where('nis', $data['nis'])->exists();

        if ($existingPengelola) {
            return redirect()->back()->with('error', 'NIS sudah terdaftar sebagai pengelola.');
        }

        $siswa = Siswa::where('nis', $data['nis'])->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'NIS tidak terdaftar sebagai anggota.');
        }

        $data['nama_siswa'] = $siswa->nama_siswa;
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('modules.kelola_akun.edit', compact('user'));
    }

    public function editProcess(Request $request, User $user)
    {
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:50',
            'nis' => 'required|string|nullable',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|string',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Ignore password if not provided
        }

        $user->update($data);

        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('kelola.akun.index')->with('success', 'Akun berhasil dihapus');
    }
}
