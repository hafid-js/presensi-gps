<?php

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






Route::middleware(['guest:karyawan'])->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [App\Http\Controllers\AuthController::class, 'proseslogin']);
});



Route::middleware(['auth:karyawan'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/proseslogout', [App\Http\Controllers\AuthController::class, 'proseslogout']);
    Route::get('/presensi/create', [App\Http\Controllers\PresensiController::class, 'create']);
    Route::post('/presensi/store', [App\Http\Controllers\PresensiController::class, 'store']);

});
