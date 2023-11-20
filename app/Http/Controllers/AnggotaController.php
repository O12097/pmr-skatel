<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\Presensi;

class AnggotaController extends Controller
{
    public function data()
    {

        $dataSiswa = Siswa::all();
        return view('modules.anggota.data_anggota.data',  ['dataSiswa' => $dataSiswa]);
    }
    public function presensi()
    {
        return view('modules.anggota.presensi.presensi');
    }
    public function pendaftar()
    {
        return view('modules.anggota.pendaftar.pendaftar');
    }

    //  FORM ROUTE URL SECTION
    public function formPresensi()
    {
        return view('modules.anggota.presensi.form');
    }
    public function formPendaftaran()
    {
        return view('modules.anggota.pendaftar.form');
    }




    public function getDataAnggota()
    {
        $dataSiswa = Siswa::all();
        dd($dataSiswa); 

        return view('modules.anggota.data_anggota.data', ['dataSiswa' => $dataSiswa]); 
    }


    // METHOD VALIDASI FORM PRESENSI
    public function submitPresensi(Request $request)
    {
        $nis = $request->input('nis');

        // cek nis yang di inputkan sudah terdaftar di table siswa apa belum
        $siswa = Siswa::where('nis', $nis)->first();

        if (!$siswa) {
            return redirect()->back()->with('nisTidakTerdaftar', 'Data Keanggotaan Anda tidak ditemukan');
        }

        // kalau nis terdaftar, masukkin ke table presensi
        Presensi::Create([
            'nis' => $nis,
            'tanggal_presensi' => now(),
            'status_presensi' => $request->input('status_presensi'),
        ]);

        return redirect()->back()->with('presensiBerhasil', 'Presensi telah dikirim!');
    }




    // METHOD VALIDASI FORM PENDAFTARAN
    public function submitPendaftaran(Request $request)
    {
        $nis = $request->input('nis');

        // cek nis yang diinputkan sudah terdaftar di table siswa
        $siswa = Siswa::where('nis', $nis)->first();

        // kalau nis belum terdaftar, masukin datanya ke table siswa
        if (!$siswa) {
            Siswa::create([
                'nis' => $nis,
                'email' => $request->input('email'),
                'nama_siswa' => $request->input('nama_siswa'),
                'kelas' => $request->input('kelas'),
                'jurusan' => $request->input('jurusan'),
                'no_telp' => $request->input('no_telp'),
            ]);
        }

        // CEK NIS sudah terdaftar di tabel pendaftar
        $nisTerdaftar = Pendaftar::where('nis', $nis)->exists();

        // Jika NIS sudah terdaftar, berikan pesan kesalahan
        if ($nisTerdaftar) {
            return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali.');
        }

        // Masukkan data ke dalam tabel pendaftar
        Pendaftar::create([
            'nis' => $nis,
            'email' => $request->input('email'),
            'nama_siswa' => $request->input('nama_siswa'),
            'kelas' => $request->input('kelas'),
            'jurusan' => $request->input('jurusan'),
            'no_telp' => $request->input('no_telp'),
        ]);

        return redirect()->back()->with('daftarBerhasil', 'Data telah dikirim, mohon tunggu informasi selanjutnya.');
    }
}

// DESY: SEMUANYA