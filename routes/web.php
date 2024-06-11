<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\NyuratController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubBagianController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Custom Route
Route::get('/dinas', [DinasController::class, 'index'])->middleware('auth');
Route::get('/tugas_mahasiswa', [TugasController::class, 'index_mahasiswa'])->middleware('auth');
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth');
Route::get('/beranda_mahasiswa', [BerandaController::class, 'index_mahasiswa'])->name('beranda_mahasiswa')->middleware('auth');
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/nyurat', [NyuratController::class, 'index'])->middleware('guest');

//Pegawai
Route::get('/beranda_pegawai', [BerandaController::class, 'index_pegawai'])->name('beranda_pegawai')->middleware('auth');
Route::get('/magang_pegawai', [MagangController::class, 'index_pegawai'])->middleware('auth');
Route::get('/tugas_pegawai', [TugasController::class, 'index_pegawai'])->middleware('auth');

//CRUD Route
Route::resource('tugas', TugasController::class)->middleware('auth');
Route::resource('mahasiswa', MahasiswaController::class)->middleware('auth');
Route::resource('pegawai', PegawaiController::class)->middleware('auth');
Route::resource('subbagian', SubBagianController::class)->middleware('auth');
Route::resource('magang', MagangController::class)->middleware('auth');

//Dynamic Custom Route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/dinas/store', [DinasController::class, 'store'])->middleware('auth');
Route::delete('/dinas/{id}', [DinasController::class, 'destroy'])->middleware('auth');
Route::put('/dinas/update/{id}', [DinasController::class, 'update'])->middleware('auth');
Route::put('/tugas/kerjakan/{id}', [TugasController::class, 'kerjakan'])->middleware('auth');
