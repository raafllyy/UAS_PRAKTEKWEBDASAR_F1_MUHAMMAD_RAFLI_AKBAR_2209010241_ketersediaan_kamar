<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ReservasiController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('level_kamar', LevelKamarController::class);
Route::resource('kamar', KamarController::class);
Route::resource('pasien', PasienController::class);
Route::resource('reservasi', ReservasiController::class);
Route::get('/kamar/{kamar}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{kamar}', [KamarController::class, 'update'])->name('kamar.update');
