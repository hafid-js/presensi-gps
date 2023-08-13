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
    Route::post('/presensi/cekpengajuanizin', [App\Http\Controllers\PresensiController::class, 'cekpengajuanizin']);
});


Route::middleware(['auth:user'])->group(function () {
    Route::get('/proseslogoutadmin', [App\Http\Controllers\AuthController::class, 'proseslogoutadmin']);

    Route::get('/panel/dashboardadmin', [App\Http\Controllers\DashboardController::class, 'dashboardadmin']);

    Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index']);
    Route::post('/karyawan/store', [App\Http\Controllers\KaryawanController::class, 'store']);
    Route::post('/karyawan/edit', [App\Http\Controllers\KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update', [App\Http\Controllers\KaryawanController::class, 'update']);
    Route::post('/karyawan/{nik}/delete', [App\Http\Controllers\KaryawanController::class, 'delete']);


    Route::get('/departemen', [App\Http\Controllers\DepartemenController::class, 'index']);
    Route::post('/departemen/store', [App\Http\Controllers\DepartemenController::class, 'store']);
    Route::post('/departemen/edit', [App\Http\Controllers\DepartemenController::class, 'edit']);
    Route::post('/departemen/{kode_dept}/update', [App\Http\Controllers\DepartemenController::class, 'update']);
    Route::post('/departemen/{kode_dept}/delete', [App\Http\Controllers\DepartemenController::class, 'delete']);

    Route::get('/presensi/monitoring', [App\Http\Controllers\PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [App\Http\Controllers\PresensiController::class, 'getpresensi']);
    Route::get('/presensi/laporan', [App\Http\Controllers\PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [App\Http\Controllers\PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [App\Http\Controllers\PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [App\Http\Controllers\PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [App\Http\Controllers\PresensiController::class, 'izinsakit']);
    Route::post('/presensi/approveizinsakit', [App\Http\Controllers\PresensiController::class, 'approveizinsakit']);
    Route::get('/presensi/{id}/batalkanizinsakit', [App\Http\Controllers\PresensiController::class, 'batalkanizinsakit']);


    Route::get('/cabang', [App\Http\Controllers\CabangController::class, 'index']);
    Route::post('/cabang/store', [App\Http\Controllers\CabangController::class, 'store']);
    Route::post('/cabang/edit', [App\Http\Controllers\CabangController::class, 'edit']);
    Route::post('/cabang/update', [App\Http\Controllers\CabangController::class, 'update']);
    Route::post('/cabang/{kode_cabang}/delete', [App\Http\Controllers\CabangController::class, 'delete']);


    Route::get('/konfigurasi/lokasikantor', [App\Http\Controllers\KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasikantor', [App\Http\Controllers\KonfigurasiController::class, 'updatelokasikantor']);
    Route::get('/konfigurasi/jamkerja', [App\Http\Controllers\KonfigurasiController::class, 'jamkerja']);
    Route::post('/konfigurasi/storejamkerja', [App\Http\Controllers\KonfigurasiController::class, 'storejamkerja']);
    Route::post('/konfigurasi/editjamkerja', [App\Http\Controllers\KonfigurasiController::class, 'editjamkerja']);
    Route::post('/konfigurasi/updatejamkerja', [App\Http\Controllers\KonfigurasiController::class, 'updatejamkerja']);
    Route::post('/konfigurasi/{kode_jam_kerja}/delete', [App\Http\Controllers\KonfigurasiController::class, 'delete']);
    Route::get('/konfigurasi/{nik}/setjamkerja', [App\Http\Controllers\KonfigurasiController::class, 'setjamkerja']);
    Route::post('/konfigurasi/storesetjamkerja', [App\Http\Controllers\KonfigurasiController::class, 'storesetjamkerja']);
    Route::post('/konfigurasi/updatesetjamkerja', [App\Http\Controllers\KonfigurasiController::class, 'updatesetjamkerja']);
    Route::post('/konfigurasi/jamkerja/{kode_jam_kerja}/delete', [App\Http\Controllers\KonfigurasiController::class, 'deletejamkerja']);

    Route::get('/konfigurasi/jamkerjadept', [App\Http\Controllers\KonfigurasiController::class, 'jamkerjadept']);
    Route::get('/konfigurasi/jamkerjadept/create', [App\Http\Controllers\KonfigurasiController::class, 'createjamkerjadept']);
    Route::post('/konfigurasi/jamkerjadept/store', [App\Http\Controllers\KonfigurasiController::class, 'storejamkerjadept']);
});
