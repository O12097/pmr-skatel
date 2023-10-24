<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLogin');

// MENU ANGGOTA
Route::get('/anggota/data', [AnggotaController::class,'data'])->name('anggota.data');
Route::get('/anggota/pendaftar',[AnggotaController::class,'pendaftar'])->name('anggota.pendaftar');
Route::get('/anggota/presensi', [AnggotaController::class,'presensi'])->name('anggota.presensi');

// MENU KEGIATAN
Route::get('/kegiatan/dokumentasi', [KegiatanController::class,'dokumentasi'])->name('kegiatan.dokumentasi');
Route::get('/kegiatan/kalender', [KegiatanController::class,'kalender'])->name('kegiatan.kalender');

Route::get('/landing', [LandingController::class, 'index']);

