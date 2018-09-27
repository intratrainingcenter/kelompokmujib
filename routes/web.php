<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('layout.Home');
});
Route::resource('dashboard','DashboardController');
Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController');
Route::resource('mapel', 'MapelController');
Route::resource('jadwal', 'JadwalPelajaranController');
Route::resource('piket', 'PiketController');
Route::resource('absensi', 'AbsensiController');
