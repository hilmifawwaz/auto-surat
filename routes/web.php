<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntarKecamatanController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\DalamKecamatanController;
use App\Http\Controllers\DevelopingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengantarKKController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PermohonanKTPController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/check', [HomeController::class, 'auth'])->name('checking');
Route::get('/get-session', [SessionController::class, 'index'])->name('session_data');
Route::get('/back', [SessionController::class, 'back'])->name('back');

Route::post('/surat', [TestController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/get-riwayat', AuditLogController::class);

Route::get('/data-surat', [AdminController::class, 'surat'])->middleware('auth');
Route::resource('/getSurat', SuratController::class);
Route::post('/postSurat', [SuratController::class, 'store']);
Route::put('/activate/{id}', [SuratController::class, 'aktif']);
Route::put('/deactivate/{id}', [SuratController::class, 'nonaktif']);

Route::get('/warga', [AdminController::class, 'warga'])->middleware('auth');
Route::resource('/getWarga', WargaController::class);
Route::post('/import', [WargaController::class, 'import'])->name('import');

Route::get('/data-pengumuman', [AdminController::class, 'pengumuman'])->middleware('auth');
Route::resource('/getPengumuman', PengumumanController::class);

Route::get('/data-wilayah', [AdminController::class, 'wilayah'])->middleware('auth');
Route::resource('/get-wilayah', WilayahController::class);

Route::get('/how-to', [TutorialController::class, 'index']);
Route::get('/permohonan-ktp', [PermohonanKTPController::class, 'index']);
Route::get('/pengantar-kk', [PengantarKKController::class, 'index']);
Route::get('/data-warga/{id}', [PengantarKKController::class, 'getDataWarga']);
Route::get('/anggota-keluarga/{id}', [PengantarKKController::class, 'getAnggotaKeluarga']);

Route::get('/develop', [DevelopingController::class, 'index']);

Route::get('/dalam-kecamatan', [DalamKecamatanController::class, 'index']);
Route::get('/kepala-keluarga/{id}', [DalamKecamatanController::class, 'kepala_keluarga']);

Route::get('/antar-kecamatan', [AntarKecamatanController::class, 'index']);
Route::get('/get-kabupaten', [AntarKecamatanController::class, 'get_kabupaten']);
Route::get('/get-kecamatan', [AntarKecamatanController::class, 'get_kecamatan']);
Route::get('/get-kelurahan', [AntarKecamatanController::class, 'get_kelurahan']);
