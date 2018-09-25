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
    return view('layout.index');
});

Route::get('/siswa', function () {
    return view('page.siswa.index');
});

Route::get('/kelas', function () {
    return view('page.kelas.index');
});

Route::resource('mapel', 'MapelController');
Route::resource('jadwal', 'JadwalPelajaranController');
Route::get('/piket', function () {
    return view('page.piket.index');
});

Route::get('/absen', function () {
    return view('page.absen.index');
});