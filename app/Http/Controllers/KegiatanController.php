<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function dokumentasi(){
        return view('modules.kegiatan.dokumentasi.dokumentasi');
    }
    
    public function kalender(){
        return view('modules.kegiatan.kalender.kalender');
    }
}