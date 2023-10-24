<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function data(){
        return view('modules.anggota.data_anggota.data');
    }
    public function presensi(){
        return view('modules.anggota.presensi.presensi');
    }
    public function pendaftar(){
        return view('modules.anggota.pendaftar.pendaftar');
    }

}

// DESY: SEMUANYA