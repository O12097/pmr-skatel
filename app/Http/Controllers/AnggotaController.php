<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\Presensi;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;



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
        $pendaftar = Pendaftar::where('nis', $nis)->first();
        $jurusan = Jurusan::where('jurusan', $request->input('jurusan'))->first();
        $kelas = Kelas::where('kelas', $request->input('kelas'))->first();

        $email = $request->input('email');
        if (!Str::endsWith($email, '@smktelkom-bjb.sch.id')) {
            return redirect()->back()->with('emailCheckMessage', 'Gunakan e-mail dari sekolah')->withInput();
        }
        // Jika NIS belum terdaftar di tabel siswa, masukkan data ke tabel pendaftar
        if (!$siswa && !$pendaftar) {
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
        } else if ($pendaftar) {
            return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
        } else if ($siswa) {
            return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
        }
    }



    public function updatePendaftaranStatus(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $pendaftar = Pendaftar::findOrFail($id);
    
            if ($request->input('status') == 'terima') {
                // Jika pendaftar belum pernah diterima sebelumnya
                if ($pendaftar->status != 'terima') {
                    // Pindahkan data ke tabel siswa
                    $siswaData = [
                        'nis' => $pendaftar->nis,
                        'email' => $pendaftar->email,
                        'nama_siswa' => $pendaftar->nama_siswa,
                        'id_kelas' => $pendaftar->id_kelas,
                        'id_jurusan' => $pendaftar->id_jurusan,
                        'no_telp' => $pendaftar->no_telp,
                        'status' => 'aktif',
                    ];
    
                    Siswa::create($siswaData);
                }
    
                // Ubah status pendaftar menjadi 'terima'
                $pendaftar->update(['status' => 'terima']);
            } elseif ($request->input('status') == 'tidak') {
                // ubah status pendaftar menjadi 'tidak' dan hapus dari tabel pendaftar
                $pendaftar->update(['status' => 'tidak']);
                $pendaftar->delete();
            } elseif ($request->input('status') == 'pending') {
                // ...
            } else {
                // Ubah status sesuai dengan nilai yang diberikan
                $pendaftar->update(['status' => $request->input('status')]);
            }
        });
    
        return redirect()->back()->with('statusBerhasil', 'Pendaftar telah berhasil diterima sebagai anggota');
    }
    


    public function cekNISPendaftar(Request $request)
    {
        $nis = $request->input('nis');
        $siswaExists = Siswa::where('nis', $nis)->exists();
        $pendaftarExists = Pendaftar::where('nis', $nis)->exists();

        return response()->json(['siswaExists' => $siswaExists, 'pendaftarExists' => $pendaftarExists]);
    }


    public function cekEmail(Request $request)
    {
        $email = $request->input('email');

        // Logika validasi email
        $validEmail = Str::endsWith($email, '@smktelkom-bjb.sch.id');
        return response()->json(['validEmail' => $validEmail]);
    }



    public function delete($nis)
    {
        $siswa = Siswa::findOrFail($nis);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
        }

        $siswa->delete();

        return redirect()->route('anggota.data')->with('success', 'Data siswa berhasil dihapus');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
        }

        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();

        return view('modules.anggota.data_anggota.edit', compact('siswa', 'dataKelas', 'dataJurusan'));
    }

    public function update(Request $request, $nis)
    {
        $siswa = Siswa::findOrFail($nis);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan');
        }

        // Validasi input form
        $request->validate([
            'nama_siswa' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'no_telp' => 'required',
            'status' => 'required',
        ]);

        // Update the data
        $siswa->update([
            'nama_siswa' => $request->input('nama_siswa'),
            'id_kelas' => $request->input('id_kelas'),
            'id_jurusan' => $request->input('id_jurusan'),
            'no_telp' => $request->input('no_telp'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('anggota.data')->with('updateDataAnggota', 'Data siswa berhasil diupdate');

    }

    public function detail($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect()->route('anggota.data')->with('error', 'Data siswa tidak ditemukan');
        }

        return view('modules.anggota.data_anggota.detail', compact('siswa'));
    }
}

// DESY: SEMUANYA