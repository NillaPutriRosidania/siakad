<?php

use App\Http\Controllers\PresensiAkademikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\RuangController;
use App\Models\Berita;
use App\Models\Pengampu;
use App\Models\PresensiAkademik;

Route::get('/', function () {
    $latestNews = Berita::latest()->paginate(5);
    return view('welcome');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'show']);

Route::get('register', [AuthController::class, 'create'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('register.store');
Route::get('forgot-password', [AuthController::class, 'edit'])->name('forgot');
Route::get('berita/{id}', [BeritaController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('berita.show');

Route::middleware('auth')->group(function () {
    //Ini untuk admin
    Route::resource('golongan', GolonganController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matakuliah', MatakuliahController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('ruang', RuangController::class);
    Route::resource('pengampu', PengampuController::class);
    Route::resource('jadwal-akademik', JadwalAkademikController::class);
    Route::resource('krs', KRSController::class);
    Route::resource('presensi-akademik', PresensiAkademikController::class);



    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::resource('dashboard', DashboardController::class);
    Route::get('/api/charts/{type}/{puskesmasId}', [DashboardController::class, 'getChartData']);
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');
});
