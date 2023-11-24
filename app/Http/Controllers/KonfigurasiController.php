<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    public function jurusan()
    {
        return view('modules.konfigurasi.jurusan.jurusan');
    }
    public function kelas()
    {
        return view('modules.konfigurasi.kelas.kelas');
    }
}
