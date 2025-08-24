<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/{slug}', [EventController::class, 'detail'])->name('event.detail');
Route::post('/{slug}/register', [EventController::class, 'processRegistration'])->name('event.register');
Route::get('/{kode_registrasi}/detail', [RegistrasiController::class, 'detail'])->name('registrasi.detail');
Route::get('/{kode_registrasi}/download', [RegistrasiController::class, 'download'])->name('registrasi.download');
