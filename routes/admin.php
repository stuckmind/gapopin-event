<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\ManagementEvent\ManagementEventController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('management-event', ManagementEventController::class);
    Route::get('management-event/{id}/qrcode', [ManagementEventController::class, 'qrcode'])
        ->name('management-event.qrcode');
});
