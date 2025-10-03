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

Route::get('/event/{slug}', [EventController::class, 'detail'])->name('event.detail');
Route::post('/event/{slug}/registrasi', [EventController::class, 'processRegistration'])->name('event.register');
Route::get('/registrasi/{kode_registrasi}/detail', [RegistrasiController::class, 'detail'])->name('registrasi.detail');
Route::get('/registrasi/{kode_registrasi}/download', [RegistrasiController::class, 'download'])->name('registrasi.download');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
