<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Validation\Rule;

class KonfigurasiController extends Controller
{
    public function jurusan()
    {
        $dataJurusan = Jurusan::all();
        return view('modules.konfigurasi.jurusan.jurusan', ['dataJurusan' => $dataJurusan]);
    }
    public function kelas()
    {
        $dataKelas = Kelas::all();
        return view('modules.konfigurasi.kelas.kelas', ['dataKelas' => $dataKelas]);
    }

    public function formJurusan()
    {
        return view('modules.konfigurasi.jurusan.form');
    }
    public function formKelas()
    {
        return view('modules.konfigurasi.kelas.form');
    }

    public function editJurusan($id_jurusan)
    {
        $dataJurusan = Jurusan::find($id_jurusan);
        return view('modules.konfigurasi.jurusan.edit', ['dataJurusan' => $dataJurusan]);
    }

    public function editKelas($id_kelas)
    {
        $dataKelas = Kelas::find($id_kelas);
        return view('modules.konfigurasi.kelas.edit', ['dataKelas' => $dataKelas]);
    }





    public function createJurusan(Request $request)
    {
        // validasi input form
        $request->validate([
            'jurusan' => 'required|string|max:100|unique:jurusan,jurusan',
            'status' => 'required|in:on,off',
        ]);

        // save data ke database
        Jurusan::create([
            'jurusan' => $request->jurusan,
            'status' => $request->status,
        ]);

        // dd($query->toSql(), $query->getBindings());

        return redirect()->route('konfigurasi.jurusan')->with('successJurusan', 'Data jurusan berhasil ditambahkan');
    }
    public function updateJurusan(Request $request, $id)
    {
        // validasi inputan
        $request->validate([
            'jurusan' => ['required', 'string', 'max:100', Rule::unique('jurusan', 'jurusan')->ignore($id, 'id_jurusan')],
            'status' => 'required|in:on,off',
        ]);

        // update data ke db
        Jurusan::where('id_jurusan', $id)->update([
            'jurusan' => $request->jurusan,
            'status' => $request->status,
        ]);

        return redirect()->route('konfigurasi.jurusan')->with('successUpdateJurusan', 'Data jurusan berhasil diperbarui');
    }





    public function createKelas(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:5|unique:kelas,kelas',
            'status' => 'required|in:on,off',
        ]);

        Kelas::create([
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('konfigurasi.kelas')->with('successKelas', 'Data kelas berhasil ditambahkan');
    }

    // Update Kelas
    public function updateKelas(Request $request, $id_kelas)
    {
        // validasi inputan
        $request->validate([
            'kelas' => ['required', 'string', 'max:5', Rule::unique('kelas', 'kelas')->ignore($id_kelas, 'id_kelas')],
            'status' => 'required|in:on,off',
        ]);

        // update data ke db
        Kelas::where('id_kelas', $id_kelas)->update([
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('konfigurasi.kelas')->with('successUpdateKelas', 'Data kelas berhasil diperbarui');
    }
}
