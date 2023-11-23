<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Contracts\Session\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('/landing/index');
});


//SESI LOGIN
Route::get('/login', [SessionController::class, 'index']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/login/proses', [SessionController::class, 'login']);
// AUTH
Route::post('/login', 'Auth\SessionController@login')->name('login');
// Route::middleware(['web'])->group(function () {
//     Route::post('/login/proses', [SessionController::class, 'login'])->name('login.proses');
// });


//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLogin');


// GET ANGGOTA-DAFTAR
Route::get('/anggota/data', [AnggotaController::class, 'data'])->name('anggota.data')->middleware('isLogin');
Route::get('/anggota/pendaftar', [AnggotaController::class, 'pendaftar'])->name('anggota.pendaftar')->middleware('isLogin');
Route::get('/daftar/form', [AnggotaController::class, 'formPendaftaran'])->name('anggota.pendaftar.form');
// POST ANGOTA-DAFTAR
Route::post('/daftar', [AnggotaController::class, 'submitPendaftaran'])->name('anggota.pendaftaran.submit');
//kode dibawah ini penambahan, buat munculin indikasi nis sudah terdaftar, tapi langsung dibawah field nis, gak perlu disubmit(Daftar)
Route::post('/anggota/cek-nis', [AnggotaController::class, 'cekNISPendaftar'])->name('anggota.cekNIS'); 


// KEGIATAN
Route::get('/kegiatan/dokumentasi', [KegiatanController::class, 'dokumentasi'])->name('kegiatan.dokumentasi')->middleware('isLogin');
Route::get('/kegiatan/kalender', [KegiatanController::class, 'kalender'])->name('kegiatan.kalender')->middleware('isLogin');


// LANDING
Route::get('/landing', [LandingController::class, 'index']);


// PRESENSI
Route::get('/anggota/presensi', [AnggotaController::class, 'presensi'])->name('anggota.presensi')->middleware('isLogin');
Route::get('/presensi', [AnggotaController::class, 'formPresensi'])->name('anggota.presensi.form');
// NYIMPAN DATA
Route::post('/presensi/proses', [AnggotaController::class, 'submitPresensi'])->name('anggota.presensi.submit');
//kode dibawah ini penambahan, buat munculin indikasi nis kalau belum terdaftar, tapi langsung dibawah field nis, gak perlu disubmit(Presensi)
Route::post('/anggota/cek-nis-presensi', [AnggotaController::class, 'cekNISPresensi'])->name('anggota.cekNISPresensi');

