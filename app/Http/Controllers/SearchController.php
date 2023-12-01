<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\Presensi;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian dalam model Siswa
        $results = Siswa::where('nama_siswa', 'like', "%$keyword%")->get();

        return view('anggota.data_anggota.data', ['dataSiswa' => $results]);
    }
}
