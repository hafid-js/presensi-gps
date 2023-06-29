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






Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [App\Http\Controllers\AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [App\Http\Controllers\AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/proseslogout', [App\Http\Controllers\AuthController::class, 'proseslogout']);

    //Presensi
    Route::get('/presensi/create', [App\Http\Controllers\PresensiController::class, 'create']);
    Route::post('/presensi/store', [App\Http\Controllers\PresensiController::class, 'store']);

    //Edit Profile
    Route::get('/editprofile', [App\Http\Controllers\PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nik}/updateprofile', [App\Http\Controllers\PresensiController::class, 'updateprofile']);

    //Histori
    Route::get('/presensi/histori', [App\Http\Controllers\PresensiController::class, 'histori']);
    Route::post('/gethistori', [App\Http\Controllers\PresensiController::class, 'gethistori']);

    //Izin
    Route::get('/presensi/izin', [App\Http\Controllers\PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [App\Http\Controllers\PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [App\Http\Controllers\PresensiController::class, 'storeizin']);
});


Route::middleware(['auth:user'])->group(function () {
    Route::get('/proseslogoutadmin', [App\Http\Controllers\AuthController::class, 'proseslogoutadmin']);

    Route::get('/panel/dashboardadmin', [App\Http\Controllers\DashboardController::class, 'dashboardadmin']);
});
