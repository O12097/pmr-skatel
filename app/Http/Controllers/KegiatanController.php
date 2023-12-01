<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function dokumentasi()
    {
        $dataKegiatan = Kegiatan::all();
        return view('modules.kegiatan.dokumentasi.dokumentasi', compact('dataKegiatan'));
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
            'deskripsi' => 'required|max:100',
            'tanggal' => 'required|date',

        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tautan_dokumentasi' => $request->tautan_dokumentasi,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('kegiatan.dokumentasi')->with('successKegiatan', 'Kegiatan berhasil ditambahkan');
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
            'nama_kegiatan' => 'required|max:100',
            'tautan_dokumentasi' => 'required|url',
            'deskripsi' => 'required|max:100',
            'tanggal' => 'required|date',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        // check apa ada perubahan
        $isChanged = $kegiatan->nama_kegiatan != $request->nama_kegiatan ||
            $kegiatan->tautan_dokumentasi != $request->tautan_dokumentasi ||
            $kegiatan->deskripsi != $request->deskripsi ||
            $kegiatan->tanggal != $request->tanggal;

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tautan_dokumentasi' => $request->tautan_dokumentasi,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        // kalau ada, update updated_at
        if ($isChanged) {
            $kegiatan->touch();
        }

        return redirect()->route('kegiatan.dokumentasi')->with('successUpdateKegiatan', 'Kegiatan berhasil diperbarui');
    }


    public function delete($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.dokumentasi')->with('successDeleteKegiatan', 'Kegiatan berhasil dihapus');
    }

    public function getCalendarEvents()
    {
        $kegiatans = Kegiatan::all();
        $events = [];
    
        foreach ($kegiatans as $kegiatan) {
            $events[] = [
                'title' => $kegiatan->nama_kegiatan, // Include nama_kegiatan in the title
                'start' => $kegiatan->tanggal,
                'url' => route('kegiatan.dokumentasi.detail', ['id' => $kegiatan->id_kegiatan]),
            ];
        }
    
        return response()->json($events);
    }
    }
