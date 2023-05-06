<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginsubmit'])->name('loginsubmit');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/table', [PagesController::class, 'table'])->name('table');
    Route::post('/logout', [AuthController::class, 'logout']);
});
