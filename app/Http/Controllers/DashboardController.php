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


class DashboardController extends Controller
{
    public function getTotalAttendanceThisMonth()
    {
        // Ambil bulan dan tahun saat ini
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        // Query untuk mengambil total presensi pada bulan ini
        $totalAttendanceThisMonth = Presensi::whereYear('tanggal_presensi', $currentYear)
            ->whereMonth('tanggal_presensi', $currentMonth)
            ->count();

        return $totalAttendanceThisMonth;
    }

    public function index()
    {
        $pendingJoinRequests = Pendaftar::where('status', 'pending')->count();
        $totalMembers = Siswa::count();

        // Assuming you have a date field in your Presensi model, adjust as needed
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        $attendanceStats = Presensi::whereYear('tanggal_presensi', $currentYear)
            ->whereMonth('tanggal_presensi', $currentMonth)
            ->selectRaw('COUNT(*) as total, status_presensi')
            ->groupBy('status_presensi')
            ->pluck('total', 'status_presensi')
            ->toArray();

        $totalAttendanceThisMonth = $this->getTotalAttendanceThisMonth();
        $pendingRegistrationRequests = Pendaftar::where('status', 'pending')->take(5)->get();
        $presensiTimeline = $this->getPresensiTimeline();

        return view('modules.dashboard.index', compact('pendingJoinRequests', 'totalMembers', 'attendanceStats', 'presensiTimeline', 'pendingRegistrationRequests', 'totalAttendanceThisMonth'));
    }
    public function pdf()
    {
        $dataPendaftar = Pendaftar::all();
        return view('modules.dashboard.pdf',  ['dataPendaftar' => $dataPendaftar]);
    }


    public function getPresensiTimeline()
    {
        $presensiTimeline = Presensi::with('siswa')
            ->latest('tanggal_presensi')
            ->take(5) // Ambil 5 data terbaru
            ->get();

        return $presensiTimeline;
    }




    // -----------------------------------------------------


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

            // Check if the status is 'terima'
            if ($request->input('status') == 'terima') {
                // Pindahkan data ke Siswa table
                $siswaData = [
                    'nis' => $pendaftar->nis,
                    'email' => $pendaftar->email,
                    'nama_siswa' => $pendaftar->nama_siswa,
                    'id_kelas' => $pendaftar->id_kelas,
                    'id_jurusan' => $pendaftar->id_jurusan,
                    'no_telp' => $pendaftar->no_telp,
                    'status' => 'aktif',
                ];

                // Log::info('Length of status value: ' . strlen($siswaData['status']));

                if ($pendaftar->status !== 'terima') {
                    $pendaftar->delete();
                }
            } elseif ($request->input('status') == 'tidak') {
                // Hapus data dari Pendaftar table
                $pendaftar->delete();
            } elseif ($request->input('status') == 'pending') {
                // Handle other status cases if needed
            } else {
                // Handle other status cases if needed
                $pendaftar->update(['status' => $request->input('status')]);
            }
        });

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
        $siswaExists = Siswa::where('nis', $nis)->exists();
        $pendaftarExists = Pendaftar::where('nis', $nis)->exists();

        return response()->json(['siswaExists' => $siswaExists, 'pendaftarExists' => $pendaftarExists]);
    }
}
