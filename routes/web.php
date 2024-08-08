<?php

use App\Http\Controllers\AktivitasMhswController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\NyuratController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeriodeMagangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubBagianController;
use App\Http\Controllers\UniversitasController;


// Route::get('/', function () {
//     return view('welcome');
// });

//Custom Route
Route::get('/dinas', [DinasController::class, 'index'])->middleware('auth');
Route::get('/tugas_mahasiswa', [TugasController::class, 'index_mahasiswa'])->middleware(['auth', 'checkRole:mahasiswa']);
// Route::get('/magang_mahasiswa', [LogbookController::class, 'index'])->middleware('auth');
Route::get('/beranda', [BerandaController::class, 'index'])->middleware(['auth', 'checkRole:admin']);
Route::get('/beranda_mahasiswa', [BerandaController::class, 'index_mahasiswa'])->name('beranda_mahasiswa')->middleware(['auth', 'checkRole:mahasiswa']);
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/nyurat', [NyuratController::class, 'index'])->middleware('guest');

//Pegawai
Route::get('/beranda_pegawai', [BerandaController::class, 'index_pegawai'])->name('beranda_pegawai')->middleware(['auth', 'checkRole:pegawai']);
Route::get('/magang_pegawai', [MagangController::class, 'index_pegawai'])->middleware(['auth', 'checkRole:pegawai']);
Route::get('/tugas_pegawai', [TugasController::class, 'index_pegawai'])->middleware(['auth', 'checkRole:pegawai']);

//CRUD Route
Route::resource('tugas', TugasController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('pegawai', PegawaiController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('subbagian', SubBagianController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('magang', MagangController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('profil', ProfilController::class)->middleware(['auth', 'checkRole:admin,pegawai,mahasiswa']);
Route::resource('logbook', LogbookController::class)->middleware('auth');
Route::resource('periodemagang', PeriodeMagangController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('aktivitas_mhsw', AktivitasMhswController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('universitas', UniversitasController::class)->middleware(['auth', 'checkRole:admin']);

//Dynamic Custom Route
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/dinas/store', [DinasController::class, 'store'])->middleware('auth');
Route::delete('/dinas/{id}', [DinasController::class, 'destroy'])->middleware('auth');
Route::put('/dinas/update/{id}', [DinasController::class, 'update'])->middleware('auth');
Route::put('/tugas/kerjakan/{id}', [TugasController::class, 'kerjakan'])->middleware('auth');
Route::post('/tugas/tambah', [TugasController::class, 'tambah'])->middleware('auth');

// Preview
Route::get('/logbook/preview/{id}', [LogbookController::class, 'preview'])->middleware('auth');
Route::get('/aktivitas_mhsw_pegawai', [AktivitasMhswController::class, 'index_pegawai'])->middleware(['auth', 'checkRole:pegawai']);
