<?php

use App\Http\Controllers\Admin\Auth\AuthController;
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

// Event Registration Form
Route::prefix('event')->group(function () {
    Route::get('{slug}', [RegistrasiController::class, 'form'])->name('registrasi.form');
    Route::post('{slug}/registrasi', [RegistrasiController::class, 'processRegistration'])->name('registrasi.process');
});

// Registrasi Routes
Route::prefix('registrasi')->name('registrasi.')->group(function () {
    Route::get('/search', [RegistrasiController::class, 'index'])->name('search');
    Route::post('/search', [RegistrasiController::class, 'searchProcess'])->name('search.process');
    Route::get('/{kode_registrasi}/detail', [RegistrasiController::class, 'detail'])->name('detail');
    Route::get('/{kode_registrasi}/download', [RegistrasiController::class, 'download'])->name('download');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
