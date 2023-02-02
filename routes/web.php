<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('index', [
        'title' => 'Beranda'
    ]);
})->name('index');

Route::post('/surat', [TestController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::get('/warga', [AdminController::class, 'warga'])->middleware('auth');

Route::get('/data-surat', [AdminController::class, 'surat'])->middleware('auth');
Route::resource('/getSurat', SuratController::class);
// Route::post('/addsurat', [SuratController::class, 'add']);
