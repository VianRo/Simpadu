<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdiController;


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

route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');
route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
    ->name('mahasiswa.create');
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', \App\Http\Controllers\ProdiController::class);