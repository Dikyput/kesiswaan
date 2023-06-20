<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginsubmit'])->name('loginsubmit');
Route::middleware(['auth'])->group(function () {
    Route::resource('datasiswa', SiswaController::class);
    Route::resource('dataguru', DataGuruController::class);

    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/datakelas', [PagesController::class, 'datakelas'])->name('datakelas');
    Route::get('/namakelas', [PagesController::class, 'namakelas'])->name('namakelas');
    Route::post('/tambahnamakelas', [PagesController::class, 'tambahnamakelas'])->name('tambahnamakelas');
    Route::post('/hapuskelas/{id}', [PagesController::class, 'hapuskelas'])->name('hapuskelas');
    Route::post('/hapusnamakelas/{id}', [PagesController::class, 'hapusnamakelas'])->name('hapusnamakelas');
    Route::get('/caridataguru', [PagesController::class, 'caridataguru'])->name('caridataguru');
    Route::get('/datapindah', [PagesController::class, 'datapindah'])->name('datapindah');
    Route::post('/tambahdatapindah', [PagesController::class, 'tambahdatapindah'])->name('tambahdatapindah');
    Route::get('/datasiswapertanggal', [PagesController::class, 'datasiswapertanggal'])->name('datasiswapertanggal');
    Route::get('/datasiswaperstatus', [PagesController::class, 'datasiswaperstatus'])->name('datasiswaperstatus');
    Route::post('/terimasiswa/{id}', [PagesController::class, 'terimasiswa']);
    Route::post('/tolaksiswa/{id}', [PagesController::class, 'tolaksiswa']);
    Route::post('/batalsiswa/{id}', [PagesController::class, 'batalsiswa']);
    Route::post('/tambahkelas', [PagesController::class, 'tambahkelas']);
    Route::post('/tambahguru', [PagesController::class, 'tambahguru']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/print', [PagesController::class, 'print'])->name('print');
});
