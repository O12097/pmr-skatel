<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KelolaAkunController;
use App\Models\Siswa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// PENDAFTARAN
Route::post('/daftar', [AnggotaController::class, 'submitPendaftaran']); //create ---- 200 OK
Route::get('/anggota/pendaftar', [AnggotaController::class, 'pendaftar']); //melihat semua daftar pendaftar ---- 200 OK
Route::get('/anggota/pendaftar/{id}/detail', [AnggotaController::class, 'detail']); //melihat detail pendaftar dengan id_pendaftar 74 ---- 200 OK
Route::post('/anggota/pendaftar/{id}/update-status', [AnggotaController::class, 'updatePendaftaranStatus']); //memperbarui status dengan id_pendaftar----- 200 OK
Route::post('/anggota/pendaftar/delete-pendaftar', [AnggotaController::class, 'deleteMultiple']); //menghapus beberapa pendaftar(bisa satu pendaftar juga) ------ 200 OK


// PRESENSI
Route::post('/presensi/proses', [AnggotaController::class, 'submitPresensi']); //menambah data presensi
Route::get('/anggota/presensi', [AnggotaController::class, 'presensi']); //melihat daftar presensi

// KEGIATAN
Route::get('/kegiatan/dokumentasi', [KegiatanController::class, 'dokumentasi']);     //lihat data kegiatan 200 OK
Route::post('/kegiatan/dokumentasi/create', [KegiatanController::class, 'create']);  //create kegiatan 
Route::put('/kegiatan/dokumentasi/{id}/edit-proses', [KegiatanController::class, 'edit']);   //troubleshoot sooner, ini dia ke direct get halaman detail
Route::get('/kegiatan/dokumentasi/{id}/delete', [KegiatanController::class, 'delete']);
Route::delete('/kegiatan/dokumentasi/{id}', [KegiatanController::class, 'delete']);
// ...
Route::get('/kegiatan/dokumentasi/calendar-events', [KegiatanController::class, 'getCalendarEvents']);
