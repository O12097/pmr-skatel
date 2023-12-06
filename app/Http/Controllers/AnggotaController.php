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
use Illuminate\Http\JsonResponse;



class AnggotaController extends Controller
{
    public function data()
    {
        $dataSiswa = Siswa::all();
        return view('modules.anggota.data_anggota.data',  ['dataSiswa' => $dataSiswa]);
    }
    public function presensi(Request $request)
    {
        $dataPresensi = Presensi::all();
        $presensiTimeline = $this->getPresensiTimeline();

        $isApiRequest = $request->is('api/*'); // Pemeriksaan berdasarkan URI

        if ($isApiRequest) {
            return response()->json($dataPresensi);
        }
        return view('modules.anggota.presensi.presensi',  ['dataPresensi' => $dataPresensi , 'presensiTimeline' => $presensiTimeline]);
    }
    public function pendaftar(Request $request)
    {
        $dataPendaftar = Pendaftar::all();

        $isApiRequest = $request->is('api/*'); // Pemeriksaan berdasarkan URI

        if ($isApiRequest) {
            return response()->json($dataPendaftar);
        }

        return view('modules.anggota.pendaftar.pendaftar', ['dataPendaftar' => $dataPendaftar]);
    }
    public function getPresensiTimeline()
    {
        $presensiTimeline = Presensi::with('siswa')
            ->latest('tanggal_presensi')
            ->get();

        return $presensiTimeline;
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




    // METHOD VALIDASI FORM PENDAFTARAN ASLI
    // public function submitPendaftaran(Request $request)
    // {
    //     $nis = $request->input('nis');

    //     // Cek NIS di tabel siswa
    //     $siswa = Siswa::where('nis', $nis)->first();
    //     $pendaftar = Pendaftar::where('nis', $nis)->first();
    //     $jurusan = Jurusan::where('jurusan', $request->input('jurusan'))->first();
    //     $kelas = Kelas::where('kelas', $request->input('kelas'))->first();

    //     $email = $request->input('email');
    //     if (!Str::endsWith($email, '@smktelkom-bjb.sch.id')) {
    //         return redirect()->back()->with('emailCheckMessage', 'Gunakan e-mail dari sekolah')->withInput();
    //     }
    //     // Jika NIS belum terdaftar di tabel siswa, masukkan data ke tabel pendaftar
    //     if (!$siswa && !$pendaftar) {
    //         Pendaftar::create([
    //             'nis' => $nis,
    //             'email' => $request->input('email'),
    //             'nama_siswa' => $request->input('nama_siswa'),
    //             'id_kelas' => $kelas->id_kelas,
    //             'id_jurusan' => $jurusan->id_jurusan,
    //             'no_telp' => $request->input('no_telp'),
    //             'status' => 'pending',
    //         ]);

    //         return redirect()->back()->with('daftarBerhasil', 'Data telah dikirim, mohon tunggu informasi selanjutnya');
    //     } else if ($pendaftar) {
    //         return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
    //     } else if ($siswa) {
    //         return redirect()->back()->with('nisSudahTerdaftar', 'NIS telah terdaftar. Satu NIS hanya dapat mendaftar satu kali');
    //     }
    // }
    // DARI GPT
    public function submitPendaftaran(Request $request)
    {
        $nis = $request->input('nis');
        $siswa = Siswa::where('nis', $nis)->first();
        $pendaftar = Pendaftar::where('nis', $nis)->first();
        $jurusan = Jurusan::where('jurusan', $request->input('jurusan'))->first();
        $kelas = Kelas::where('kelas', $request->input('kelas'))->first();

        $email = $request->input('email');

        // Pemeriksaan sumber permintaan (API atau web)
        $isApiRequest = $request->is('api/*'); // Pemeriksaan berdasarkan URI

        if (!$isApiRequest) {
            // Ini adalah permintaan dari aplikasi web
            if (!Str::endsWith($email, '@smktelkom-bjb.sch.id')) {
                return redirect()->back()->with('emailCheckMessage', 'Gunakan e-mail dari sekolah')->withInput();
            }

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
        } else {
            // Ini adalah permintaan dari API
            $newPendaftar = new Pendaftar();
            $newPendaftar->nis = $request->nis;
            $newPendaftar->email = $request->email;
            $newPendaftar->nama_siswa = $request->nama_siswa;
            $newPendaftar->id_kelas = $request->id_kelas;
            $newPendaftar->id_jurusan = $request->id_jurusan;
            $newPendaftar->no_telp = $request->no_telp;

            // Simpan data
            $newPendaftar->save();

            return response()->json('Data pendaftaran Anda berhasil dikirim');
        }
    }


    // KODE ASLI
    // public function updatePendaftaranStatus(Request $request, $id)
    // {
    //     DB::transaction(function () use ($request, $id) {
    //         $pendaftar = Pendaftar::findOrFail($id);

    //         if ($request->input('status') == 'terima') {
    //             // Jika pendaftar belum pernah diterima sebelumnya
    //             if ($pendaftar->status != 'terima') {
    //                 // Pindahkan data ke tabel siswa
    //                 $siswaData = [
    //                     'nis' => $pendaftar->nis,
    //                     'email' => $pendaftar->email,
    //                     'nama_siswa' => $pendaftar->nama_siswa,
    //                     'id_kelas' => $pendaftar->id_kelas,
    //                     'id_jurusan' => $pendaftar->id_jurusan,
    //                     'no_telp' => $pendaftar->no_telp,
    //                     'status' => 'aktif',
    //                 ];

    //                 Siswa::create($siswaData);
    //             }

    //             // Ubah status pendaftar menjadi 'terima'
    //             $pendaftar->update(['status' => 'terima']);
    //         } elseif ($request->input('status') == 'tidak') {
    //             // ubah status pendaftar menjadi 'tidak' dan hapus dari tabel pendaftar
    //             $pendaftar->update(['status' => 'tidak']);
    //             $pendaftar->delete();
    //         } elseif ($request->input('status') == 'pending') {
    //             // ...
    //         } else {
    //             // Ubah status sesuai dengan nilai yang diberikan
    //             $pendaftar->update(['status' => $request->input('status')]);
    //         }

    //     });

    //     return redirect()->back()->with('statusBerhasil', 'Pendaftar telah berhasil diterima sebagai anggota');
    // }

    // DARI GPT
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

            // Pemeriksaan sumber permintaan (API atau web)
            $isApiRequest = $request->is('api/*');

            if ($isApiRequest) {
                // Jika permintaan berasal dari API, tampilkan pesan JSON
                $pendaftar = Pendaftar::findorfail($request->id);
                $pendaftar->status = $request->status;

                $pendaftar->update();
                return response()->json(['message' => 'Status pengguna berhasil diubah']);
            }
        });

        // Jika permintaan dari web, kembalikan redirect seperti semula
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

    public function detail(Request $request, $id)
    {
        $isApiRequest = $request->is('api/*'); // Pemeriksaan berdasarkan URI

        try {
            $pendaftar = Pendaftar::findOrFail($id);

            if ($isApiRequest) {
                return response()->json($pendaftar);
            }

            return view('modules.anggota.pendaftar.detail', ['pendaftar' => $pendaftar]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika data tidak ditemukan, tangani kesalahan di sini
            if ($isApiRequest) {
                return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
            }

            return redirect()->route('anggota.pendaftar.detail')->with('error', 'Data siswa tidak ditemukan');
        }
    }
    public function detailData(Request $request, $nis)
    {
        // $siswa = Siswa::find($nis);
        // if (!$siswa) {
        //     return redirect()->route('anggota.data.detail')->with('error', 'Data siswa tidak ditemukan');
        // }
        // return view('modules.anggota.data_anggota.detail', ['siswa' => $siswa]);
        $isApiRequest = $request->is('api/*'); // Pemeriksaan berdasarkan URI

        try {
            $dataSiswa = Siswa::findOrFail($nis);

            if ($isApiRequest) {
                return response()->json($dataSiswa);
            }

            return view('modules.anggota.data_anggota.detail', ['dataSiswa' => $dataSiswa]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika data tidak ditemukan, tangani kesalahan di sini
            if ($isApiRequest) {
                return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
            }

            return redirect()->route('anggota.data.detail')->with('error', 'Data siswa tidak ditemukan');
        }
    }

    public function deleteMultiple(Request $request)
    {
        // Mendapatkan daftar ID yang akan dihapus dari request
        $idsToDelete = $request->input('ids', []);

        $isApiRequest = $request->is('api/*');

        if ($isApiRequest) {
            Pendaftar::findorfail($request->id_pendaftar)->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        } else {
            try {
                // Log the received IDs for debugging
                Log::info('IDs to delete: ' . json_encode($idsToDelete));

                // Hapus data berdasarkan ID
                Pendaftar::whereIn('id_pendaftar', $idsToDelete)->delete();

                // Response untuk memberi tahu bahwa penghapusan berhasil
                return response()->json(['message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                // Log any exceptions for debugging
                Log::error('Error deleting data: ' . $e->getMessage());

                // Handle any exceptions if needed
                return response()->json(['message' => 'Gagal menghapus data'], 500);
            }
        }
    }
}

// DESY: SEMUANYA