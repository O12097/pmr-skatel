<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function dokumentasi()
    {
        $kegiatans = Kegiatan::all();
        return view('modules.kegiatan.dokumentasi.dokumentasi', compact('kegiatans'));
    }

    public function createForm()
    {
        return view('modules.kegiatan.dokumentasi.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:100',
            'tautan_dokumentasi' => 'required|url',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tautan_dokumentasi' => $request->tautan_dokumentasi,
        ]);

        return redirect()->route('kegiatan.dokumentasi')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function detail($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('modules.kegiatan.dokumentasi.detail', compact('kegiatan'));
    }

    public function editForm($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('modules.kegiatan.dokumentasi.edit', compact('kegiatan'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:50',
            'tautan_dokumentasi' => 'required|url',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tautan_dokumentasi' => $request->tautan_dokumentasi,
        ]);

        return redirect()->route('kegiatan.dokumentasi')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.dokumentasi')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
