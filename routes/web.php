<?php

use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KrsController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MatkulController;
use App\Http\Controllers\Admin\PengampuController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\Mahasiswa\MahasiswaController as MahasiswaMahasiswaController;
use App\Models\Matkul;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name("dashboard");


Route::prefix('admin')->group(function(){
    Route::resource('dosen', DosenController::class);
    Route::get('pengampu', [PengampuController::class, 'index'])->name('pengampu');
    Route::get('presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('krs', [KrsController::class, 'index'])->name('krs');
    Route::get('ruang', [RuangController::class, 'index'])->name('ruang');
    Route::get('/ruang/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
    Route::put('/ruang/{id}', [RuangController::class, 'update'])->name('ruang.update');
    Route::delete('/ruang/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy');
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('matkul', [MatkulController::class, 'index'])->name('matkul');
    Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matakuliah.index');
    Route::get('/matakuliah/{kode_mk}/edit', [MatkulController::class, 'edit'])->name('matakuliah.edit');
    Route::put('/matakuliah/{kode_mk}', [MatkulController::class, 'update'])->name('matakuliah.update');
    Route::delete('/matakuliah/{kode_mk}', [MatkulController::class, 'destroy'])->name('matakuliah.destroy');
    Route::resource('golongan', GolonganController::class);
});

Route::prefix('mahasiswa')->group(function(){
    Route::get('/', [MahasiswaMahasiswaController::class, 'index'])->name('mahasiswa');
});

