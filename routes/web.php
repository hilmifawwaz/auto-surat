<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WargaController;
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

Route::post('/surat', [TestController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/data-surat', [AdminController::class, 'surat'])->middleware('auth');
Route::resource('/getSurat', SuratController::class);
Route::post('/postSurat', [SuratController::class, 'store']);

Route::get('/warga', [AdminController::class, 'warga'])->middleware('auth');
Route::resource('/getWarga', WargaController::class);
Route::post('/import', [WargaController::class, 'import'])->name('import');

Route::get('/data-pengumuman', [AdminController::class, 'pengumuman'])->middleware('auth');
Route::resource('/getPengumuman', PengumumanController::class);
