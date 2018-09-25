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

Route::resource('siswa', 'SiswaController');
// Route::delete('/HapusSiswa/{id}', 'SiswaController@hapus');
// Route::get('/InsertSiswa', 'SiswaController@create')->name('insertSiswa');
// Route::post('/StoreSiswa', 'SiswaController@store')->name('storeSiswa');

Route::get('/kelas', function () {
    return view('page.kelas.index');
});

Route::get('/mapel', function () {
    return view('page.mapel.index');
});

Route::get('/piket', function () {
    return view('page.piket.index');
});

Route::get('/absen', function () {
    return view('page.absen.index');
});
