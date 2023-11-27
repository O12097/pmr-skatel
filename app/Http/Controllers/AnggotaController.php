<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\Presensi;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Support\Facades\View;

class AnggotaController extends Controller
{
    public function data()
    {
        $dataSiswa = Siswa::all();
        return view('modules.anggota.data_anggota.data',  ['dataSiswa' => $dataSiswa]);
    }
    public function presensi()
    {
        $dataPresensi = Presensi::all();
        return view('modules.anggota.presensi.presensi',  ['dataPresensi' => $dataPresensi]);
    }
    public function pendaftar()
    {
        $dataPendaftar = Pendaftar::all();
        return view('modules.anggota.pendaftar.pendaftar',  ['dataPendaftar' => $dataPendaftar]);
    }

    //  FORM ROUTE URL SECTION
    public function formPresensi()
    {
        return view('modules.anggota.presensi.form');
    }
    public function formPendaftaran()
    {
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        return view('modules.anggota.pendaftar.form', compact('dataKelas', 'dataJurusan'));
    }





    // METHOD VALIDASI FORM PRESENSI
    public function submitPresensi(Request $request)
    {
        $nis = $request->input('nis');
        // $statusPresensi = $request->input('status_presensi');
        // dd($statusPresensi);

        // cek nis yang di inputkan sudah terdaftar di table siswa apa belum
        $siswa = Siswa::where('nis', $nis)->first();

        if (!$siswa) {
            return redirect()->back()->with('nisTidakTerdaftar', 'Data Keanggotaan Anda tidak ditemukan');
        }

        // kalau nis terdaftar, masukkin ke table presensi
        Presensi::Create([
            'nis' => (string)$nis,
            'tanggal_presensi' => now(),
            'status_presensi' => $request->input('status_presensi'),
        ]);

        return redirect()->back()->with('presensiBerhasil', 'Presensi telah dikirim!');
    }
    public function cekNISPresensi(Request $request)
    {
        $nisPresensi = $request->input('nis');
        $presensiSiswa = Siswa::where('nis', $nisPresensi)->exists();

        return response()->json(['exists' => $presensiSiswa]);
    }




    // METHOD VALIDASI FORM PENDAFTARAN
    public function submitPendaftaran(Request $request)
    {
        $nis = $request->input('nis');

        // Cek NIS di tabel siswa
        $siswa = Siswa::where('nis', $nis)->first();
        $jurusan = Jurusan::where('jurusan', $request->input('jurusan'))->first();
        $kelas = Kelas::where('kelas', $request->input('kelas'))->first();

        // Jika NIS belum terdaftar di tabel siswa, masukkan data ke tabel siswa
        if (!$siswa) {
            Siswa::create([
                'nis' => $nis,
                'email' => $request->input('email'),
                'nama_siswa' => $request->input('nama_siswa'),
                'id_kelas' => $kelas->id_kelas,
                'id_jurusan' => $jurusan->id_jurusan,
                'no_telp' => $request->input('no_telp'),
            ]);
        } else {
            // NIS sudah terdaftar, pass the error message to the view
            return redirect()->back()->with('nisSudahTerdaftar', 'NIS sudah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
        }

        $nisTerdaftar = Pendaftar::where('nis', $nis)->exists();

        if ($nisTerdaftar) {
            return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
        }

        // Masukkan data ke dalam tabel pendaftar
        Pendaftar::create([
            'nis' => $nis,
            'email' => $request->input('email'),
            'nama_siswa' => $request->input('nama_siswa'),
            'id_kelas' => $kelas->id_kelas,
            'id_jurusan' => $jurusan->id_jurusan,
            'no_telp' => $request->input('no_telp'),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('daftarBerhasil', 'Data telah dikirim, mohon tunggu informasi selanjutnya');
    }

    public function updatePendaftaranStatus(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update(['status' => $request->input('status')]);

        if ($request->input('status') == 'terima') {
            // Move data to Siswa table
            Siswa::create([
                'nis' => $pendaftar->nis,
                'email' => $pendaftar->email,
                'nama_siswa' => $pendaftar->nama_siswa,
                'id_kelas' => $pendaftar->id_kelas,
                'id_jurusan' => $pendaftar->id_jurusan,
                'no_telp' => $pendaftar->no_telp,
                'status' => 'aktif',
            ]);

            // Delete the Pendaftar record
            $pendaftar->delete();
        } else {
            // Delete the Pendaftar record
            $pendaftar->delete();
        }

        return redirect()->back()->with('statusBerhasil', 'Status pendaftaran berhasil diubah.');
    }
    public function detail($id)
    {
        $pendaftar = Pendaftar::find($id);

        if (!$pendaftar) {
            return View::make('modules.anggota.pendaftar.detail')->with('pendaftar', null);
        }

        return View::make('modules.anggota.pendaftar.detail')->with('pendaftar', $pendaftar);
    }

    public function cekNISPendaftar(Request $request)
    {
        $nis = $request->input('nis');
        $siswa = Siswa::where('nis', $nis)->exists();

        return response()->json(['exists' => $siswa]);
    }
}

// DESY: SEMUANYA