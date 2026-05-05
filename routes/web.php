<?php

use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('fakultas.cretae');
});

Route::resource('/fakultas', FakultasController::class);

Route::resource('/periode', PeriodeController::class);

Route::resource('/berita', BeritaController::class);

Route::get('/prodi', [ProdiController::class, 'index']);