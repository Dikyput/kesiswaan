<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginsubmit'])->name('loginsubmit');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/datasiswa', [PagesController::class, 'datasiswa'])->name('datasiswa');
    Route::get('/datapindah', [PagesController::class, 'datapindah'])->name('datapindah');
    Route::get('/datasiswapertanggal', [PagesController::class, 'datasiswapertanggal'])->name('datasiswapertanggal');
    Route::get('/datasiswaperstatus', [PagesController::class, 'datasiswaperstatus'])->name('datasiswaperstatus');
    Route::post('/terimasiswa/{id}', [PagesController::class, 'terimasiswa']);
    Route::post('/tolaksiswa/{id}', [PagesController::class, 'tolaksiswa']);
    Route::post('/batalsiswa/{id}', [PagesController::class, 'batalsiswa']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
