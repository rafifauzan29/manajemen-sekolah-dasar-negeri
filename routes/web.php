<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\JadwalGuruController;
use App\Http\Controllers\PengaturanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class)->parameters([
            'kelas' => 'kelas'
        ]);
        Route::resource('mapel', MapelController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('pengaturan', PengaturanController::class);
    });

    Route::middleware('role:guru')->group(function () {
        Route::resource('absensi', AbsensiController::class)->only(['index', 'create', 'store']);
        Route::resource('nilai', NilaiController::class)->only(['index', 'create', 'store', 'edit', 'update']);
        Route::get('raport', [RaportController::class, 'index'])->name('raport.index');
        Route::get('jadwal-mengajar', [JadwalGuruController::class, 'index'])->name('jadwal-guru.index');
    });
});
