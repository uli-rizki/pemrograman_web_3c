<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\BlogController;
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
    return view('welcome');
});
Route::get('/portfolio', function() {
    return view('portfolio');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
Route::post('/mahasiswa/tambah', [MahasiswaController::class, 'simpan']);
Route::get('/mahasiswa/edit/{mahasiswa_id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{mahasiswa_id}', [MahasiswaController::class, 'update']);

Route::get('/prodi', [ProdiController::class, 'index']);

Route::get('/blog', [BlogController::class, 'index']);
