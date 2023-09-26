<?php

// use App\Http\Controllers\CobaController;
// use App\Http\Controllers\SiswaController;
// use App\Http\Controllers\GuruController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
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
    return view('welcome');
});

//SESI LOGIN
Route::get('/login', [SessionController::class, 'index']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/login/proses', [SessionController::class, 'login']);


//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLogin');

// Route::get('ppdb', function () {
//     return view('telkom');
// });
// Route::get('perpus', function () {
//     return view('perpus');
// });
// Route::get('siswa', function () {
//     return view('siswi');
// });


// //pemanggilan controller
// Route::get('coba', [CobaController::class, 'index']);

// Route::get('indexsiswa', [SiswaController::class, 'indexsiswa']);
// Route::get('siswa', [SiswaController::class, 'siswa']);
// Route::get('angkatan', [SiswaController::class, 'angkatan']);

// Route::get('indexguru', [GuruController::class, 'indexguru']);
// Route::get('guru', [GuruController::class, 'guru']);
// Route::get('mapel', [GuruController::class, 'mapel']);

