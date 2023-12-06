<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KelolaAkunController;
use App\Models\Siswa;


// use App\Models\Konfigurasi;
// use Illuminate\Contracts\Session\Session;

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
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
Route::post('/login/proses', [SessionController::class, 'login']);
// AUTH
Route::post('/login', 'Auth\SessionController@login')->name('login');


//FOLDER DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLogin');
Route::get('/dashboard/pdf', [DashboardController::class, 'pdf'])->name('download.pdf')->middleware('isLogin');

// FOLDER DATA ANGGOTA
Route::get('/anggota/data', [AnggotaController::class, 'data'])->name('anggota.data')->middleware('isLogin');
Route::get('/anggota/data/{nis}/edit', [AnggotaController::class, 'edit'])->name('anggota.data.edit')->middleware('isLogin');
Route::get('/anggota/data/{nis}/detail', [AnggotaController::class, 'detailData'])->name('anggota.data.detail')->middleware('isLogin');
Route::put('/anggota/data/{nis}/update', [AnggotaController::class, 'update'])->name('anggota.data.update');
Route::delete('/anggota/data/{nis}/delete', [AnggotaController::class, 'delete'])->name('anggota.data.delete')->middleware('isLogin');
Route::post('/anggota/data/delete-multiple', [AnggotaController::class, 'deleteMultiple'])->name('anggota.data.deleteMultiple');


// FOLDER PENDAFTAR
Route::get('/anggota/pendaftar', [AnggotaController::class, 'pendaftar'])->name('anggota.pendaftar')->middleware('isLogin');
Route::get('/daftar/form', [AnggotaController::class, 'formPendaftaran'])->name('anggota.pendaftar.form');
Route::post('/daftar', [AnggotaController::class, 'submitPendaftaran'])->name('anggota.pendaftaran.submit');
Route::get('/anggota/pendaftar/{id}/detail', [AnggotaController::class, 'detail'])->name('anggota.pendaftar.detail')->middleware('isLogin');
Route::post('/anggota/pendaftar/{id}/update-status/{status}', [AnggotaController::class, 'updatePendaftaranStatus'])->name('anggota.pendaftar.updateStatus');
Route::post('/anggota/cek-email', [AnggotaController::class, 'cekEmail'])->name('anggota.cekEmail');

//kode dibawah ini penambahan, buat munculin indikasi nis sudah terdaftar, tapi langsung dibawah field nis, gak perlu disubmit(Daftar)
Route::post('/anggota/cek-nis', [AnggotaController::class, 'cekNISPendaftar'])->name('anggota.cekNIS');
Route::post('/anggota/pendaftar/update-status/{id}', [AnggotaController::class, 'updatePendaftaranStatus'])->name('anggota.pendaftar.updateStatus');
Route::post('/anggota/pendaftar/delete-multiple', [AnggotaController::class, 'deleteMultiple'])->name('anggota.pendaftar.deleteMultiple');


// FOLDER PRESENSI
Route::get('/anggota/presensi', [AnggotaController::class, 'presensi'])->name('anggota.presensi')->middleware('isLogin');
Route::get('/presensi', [AnggotaController::class, 'formPresensi'])->name('anggota.presensi.form');
Route::post('/presensi/proses', [AnggotaController::class, 'submitPresensi'])->name('anggota.presensi.submit');
//kode dibawah ini penambahan, buat munculin indikasi nis kalau belum terdaftar, tapi langsung dibawah field nis, gak perlu disubmit(Presensi)
Route::post('/anggota/cek-nis-presensi', [AnggotaController::class, 'cekNISPresensi'])->name('anggota.cekNISPresensi');



// FOLDER KEGIATAN
Route::get('/kegiatan/dokumentasi', [KegiatanController::class, 'dokumentasi'])->name('kegiatan.dokumentasi')->middleware('isLogin');
Route::get('/kegiatan/dokumentasi/create', [KegiatanController::class, 'createForm'])->name('kegiatan.dokumentasi.createForm')->middleware('isLogin');
Route::post('/kegiatan/dokumentasi/create', [KegiatanController::class, 'create'])->name('kegiatan.dokumentasi.create')->middleware('isLogin');
Route::get('/kegiatan/dokumentasi/{id}', [KegiatanController::class, 'detail'])->name('kegiatan.dokumentasi.detail')->middleware('isLogin');
Route::get('/kegiatan/dokumentasi/{id}/edit', [KegiatanController::class, 'editForm'])->name('kegiatan.dokumentasi.editForm')->middleware('isLogin');
Route::put('/kegiatan/dokumentasi/{id}/edit-proses', [KegiatanController::class, 'edit'])->name('kegiatan.dokumentasi.edit')->middleware('isLogin');
Route::get('/kegiatan/dokumentasi/{id}/delete', [KegiatanController::class, 'delete'])->name('kegiatan.dokumentasi.destroy')->middleware('isLogin');
Route::delete('/kegiatan/dokumentasi/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.dokumentasi.delete')->middleware('isLogin');
// ...
Route::get('/kegiatan/dokumentasi/calendar-events', [KegiatanController::class, 'getCalendarEvents'])->name('kegiatan.dokumentasi.calendar-events')->middleware('isLogin');



// FOLDER BERANDA/LANDING PAGE
Route::get('/landing', [LandingController::class, 'index']);



// FOLDER KONFIGURASI
Route::get('/konfigurasi/jurusan', [KonfigurasiController::class, 'jurusan'])->name('konfigurasi.jurusan')->middleware('isLogin');
Route::get('/konfigurasi/kelas', [KonfigurasiController::class, 'kelas'])->name('konfigurasi.kelas')->middleware('isLogin');
// ...
Route::get('/konfigurasi/jurusan/form', [KonfigurasiController::class, 'formJurusan'])->name('konfigurasi.jurusan.form')->middleware('isLogin');
Route::post('/konfigurasi/jurusan/create', [KonfigurasiController::class, 'createJurusan'])->name('konfigurasi.jurusan.create')->middleware('isLogin');
Route::post('/konfigurasi/jurusan/update/{id}', [KonfigurasiController::class, 'updateJurusan'])->name('konfigurasi.jurusan.update')->middleware('isLogin');
Route::get('/konfigurasi/jurusan/edit/{id_jurusan}', [KonfigurasiController::class, 'editJurusan'])->name('konfigurasi.jurusan.edit')->middleware('isLogin');
// ...
Route::get('/konfigurasi/kelas/form', [KonfigurasiController::class, 'formKelas'])->name('konfigurasi.kelas.form')->middleware('isLogin');
Route::post('/konfigurasi/kelas/create', [KonfigurasiController::class, 'createKelas'])->name('konfigurasi.kelas.create')->middleware('isLogin');
Route::post('/konfigurasi/kelas/update/{id_kelas}', [KonfigurasiController::class, 'updateKelas'])->name('konfigurasi.kelas.update')->middleware('isLogin');
Route::get('/konfigurasi/kelas/edit/{id_kelas}', [KonfigurasiController::class, 'editKelas'])->name('konfigurasi.kelas.edit')->middleware('isLogin');


// FOLDER KELOLA_AKUN
Route::get('/kelola_akun/index', [KelolaAkunController::class, 'index'])->name('kelola.akun.index')->middleware('isLogin');
Route::get('/kelola_akun/create', [KelolaAkunController::class, 'create'])->name('kelola.akun.form-tambah')->middleware('isLogin');
Route::post('/kelola_akun/createProcess', [KelolaAkunController::class, 'createProcess'])->name('kelola.akun.createProcess')->middleware('isLogin');
Route::get('/kelola_akun/{user}/edit', [KelolaAkunController::class, 'edit'])->name('kelola.akun.form-edit')->middleware('isLogin');
Route::put('/kelola_akun/{user}/editProcess', [KelolaAkunController::class, 'editProcess'])->name('kelola.akun.editProcess')->middleware('isLogin');
Route::delete('/kelola_akun/{user}/destroy', [KelolaAkunController::class, 'destroy'])->name('kelola.akun.destroy')->middleware('isLogin');
Route::get('/get-siswa-by-nis/{nis}', function ($nis) {
    $siswa = Siswa::where('nis', $nis)->first();

    if ($siswa) {
        return response()->json(['nama_siswa' => $siswa->nama_siswa]);
    } else {
        return response()->json(['nama_siswa' => null]);
    }
});