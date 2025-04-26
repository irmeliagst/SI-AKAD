<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KrsController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MatkulController;
use App\Http\Controllers\Admin\PengampuController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Mahasiswa\AuthController as MahasiswaAuthController;
use App\Http\Controllers\Mahasiswa\MahasiswaController as MahasiswaMahasiswaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;
use App\Models\Golongan;
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

Route::get('/', function () {
    return redirect()->route('mahasiswa.login');
});

// Route::get('/', function () {
//     return view('dashboard.dashboard');
// })->name("dashboard");


Route::prefix('admin')->group(function () {

    Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('login_process', [AdminAuthController::class, 'login_process'])->name('admin.login_process');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('logout',[AdminAuthController::class,'logout'])->name('admin.logout');
        Route::resource('dosen', DosenController::class);
        Route::get('pengampu', [PengampuController::class, 'index'])->name('pengampu');
        Route::post('/pengampu', [PengampuController::class, 'store'])->name('pengampu.store');
        Route::get('presensi', [PresensiController::class, 'index'])->name('presensi');
        Route::get('presensi', [PresensiController::class, 'store'])->name('presensi.store');
        Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');
        Route::get('krs', [KrsController::class, 'index'])->name('krs');
        Route::get('ruang', [RuangController::class, 'index'])->name('ruang');
        Route::post('/ruang', [RuangController::class, 'store'])->name('ruang.store');
        Route::put('/ruang/update/{id}', [RuangController::class, 'update'])->name('ruang.update');
        Route::delete('/ruang/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy');
        Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.mahasiswa');
        Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
        Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
        Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
        Route::get('matkul', [MatkulController::class, 'index'])->name('matkul');
        Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matkul.index');
        Route::put('/matakuliah/{kode_mk}', [MatkulController::class, 'update'])->name('matkul.update');
        Route::delete('/matakuliah/{kode_mk}', [MatkulController::class, 'destroy'])->name('matkul.destroy');
        Route::post('/matakuliah', [MatkulController::class, 'store'])->name('matkul.store');
        Route::resource('golongan', GolonganController::class);
        Route::get('golongan', [GolonganController::class, 'index'])->name('golongan');
        Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.index');
        Route::post('/golongan', [GolonganController::class, 'store'])->name('golongan.store');
        Route::put('admin/golongan/{id_gol}', [GolonganController::class, 'update'])->name('golongan.update');

        Route::post('/krs', [KrsController::class, 'store'])->name('krs.store');
        Route::resource('jadwal', JadwalController::class);
        Route::resource('ruang', RuangController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
    });
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('mahasiswa/login', [MahasiswaAuthController::class, 'index'])->name('mahasiswa.login');
Route::post('mahasiswa/login_process', [MahasiswaAuthController::class, 'login_process'])->name('mahasiswa.login_process');
Route::middleware(MahasiswaMiddleware::class)->group(function () {
    Route::get('mahasiswa/logout', [MahasiswaAuthController::class, 'logout'])->name('mahasiswa.logout');
    // Route::get('mahasiswa/presensi',)
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', [MahasiswaMahasiswaController::class, 'index'])->name('mahasiswa.presensi');
    });
});

// Route::middleware(MahasiswaMiddleware::class)->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard')->middleware('role:admin');

//     Route::get('/mahasiswa/dashboard', function () {
//         return view('mahasiswa.dashboard');
//     })->name('mahasiswa.dashboard')->middleware('role:mahasiswa');
// });


