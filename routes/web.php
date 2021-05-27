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
    return view('welcome');
});
Auth::routes();
Route::group(['prefix'=>'home','middleware'=>'akses.sarpras'], function() { //admin
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/user', 'SarprasController@user')->name('user');

    Route::get('/aset', 'SarprasController@aset')->name('aset'); //daftar aset
    Route::get('/aset/detail/{id}', 'SarprasController@detailaset'); //detail aset
    Route::get('/aset/edit/{id}','SarprasController@formupdateaset'); //passing id edit aset
    Route::get('/aset/edit','SarprasController@formupdateaset')->name('aset-form-edit'); //form edit aset
    Route::post('/aset/edit','SarprasController@editupdateaset'); //edit aset
    Route::get('/aset/hapus/{id}','SarprasController@deleteaset'); // hapus aset
    Route::get('/aset/tambah','SarprasController@asetform')->name('aset-form'); //form tambah aset
    Route::post('/aset/tambah','SarprasController@asettambah'); //tambah aset

    Route::get('/ruang', 'SarprasController@ruang')->name('ruang');
    Route::get('/ruang/tambah','SarprasController@ruangform')->name('ruang-form');
    Route::post('/ruang/tambah','SarprasController@ruangtambah');

    Route::get('/jenis', 'SarprasController@jenis')->name('jenis');
    Route::get('/jenis/tambah','SarprasController@jenisform')->name('jenis-form');
    Route::post('/jenis/tambah','SarprasController@jenistambah');

    Route::get('/perbaikan', 'SarprasController@perbaikan')->name('perbaikan'); //daftar perbaikan
    Route::get('/perbaikan/status/{id}', 'SarprasController@perbaikanformstatusupdate'); //passing id status perbaikan
    Route::get('/perbaikan/status', 'SarprasController@perbaikanformstatusupdate')->name('perbaikan-status'); //form edit status perbaikan
    Route::post('/perbaikan/status', 'SarprasController@perbaikanstatusupdate'); //edit status perbaikan
    Route::get('/perbaikan/aset', 'SarprasController@perbaikanaset')->name('perbaikan-aset'); //daftar aset(khusus perbaikan)
    Route::get('/perbaikan/aset/tambah/{id}','SarprasController@perbaikanform'); //passing id tambah perbaikan
    Route::get('/perbaikan/aset/tambah','SarprasController@perbaikanform')->name('perbaikan-form'); //form tambah perbaikan
    Route::post('/perbaikan/aset/tambah','SarprasController@perbaikantambah'); //tambah perbaikan
});

