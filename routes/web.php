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
Route::group(['prefix'=>'sarpras','middleware'=>'akses.sarpras'], function() { //admin
    //Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'SarprasController@dashboard')->name('sarpras-home'); //dashboard

    Route::get('/user', 'SarprasController@user')->name('sarpras-user');
    Route::get('/user/tambah','SarprasController@userform')->name('sarpras-user-form'); //form tambah user
    Route::post('/user/tambah','SarprasController@usertambah'); //tambah user

    Route::get('/aset', 'SarprasController@aset')->name('sarpras-aset'); //daftar aset
    Route::get('/aset/detail/{id}', 'SarprasController@detailaset'); //detail aset
    Route::get('/aset/edit/{id}','SarprasController@formupdateaset'); //passing id edit aset
    Route::get('/aset/edit','SarprasController@formupdateaset')->name('sarpras-aset-form-edit'); //form edit aset
    Route::post('/aset/edit','SarprasController@editupdateaset'); //edit aset
    Route::get('/aset/hapus/{id}','SarprasController@deleteaset'); // hapus aset
    Route::get('/aset/tambah','SarprasController@asetform')->name('sarpras-aset-form'); //form tambah aset
    Route::post('/aset/tambah','SarprasController@asettambah'); //tambah aset

    Route::get('/ruang', 'SarprasController@ruang')->name('sarpras-ruang');
    Route::get('/ruang/edit/{id}','SarprasController@formupdateruang'); //passing id edit ruang
    Route::get('/ruang/edit','SarprasController@formupdateruang')->name('sarpras-ruang-form-edit'); //form edit ruang
    Route::post('/ruang/edit','SarprasController@editupdateruang'); //edit ruang
    Route::get('/ruang/tambah','SarprasController@ruangform')->name('sarpras-ruang-form'); //form tambah ruang
    Route::post('/ruang/tambah','SarprasController@ruangtambah'); //tambah ruang

    Route::get('/jenis', 'SarprasController@jenis')->name('sarpras-jenis');
    Route::get('/jenis/edit/{id}','SarprasController@formupdatejenis'); //passing id edit jenis
    Route::get('/jenis/edit','SarprasController@formupdatejenis')->name('sarpras-jenis-form-edit'); //form edit jenis
    Route::post('/jenis/edit','SarprasController@editupdatejenis'); //edit jenis
    Route::get('/jenis/tambah','SarprasController@jenisform')->name('sarpras-jenis-form'); //form tambah jenis
    Route::post('/jenis/tambah','SarprasController@jenistambah'); //tambah jenis

    Route::get('/perbaikan', 'SarprasController@perbaikan')->name('sarpras-perbaikan'); //daftar perbaikan
    Route::get('/perbaikan/detail/{id}', 'SarprasController@detailperbaikan'); //detail perbaikan
    Route::get('/perbaikan/status/{id}', 'SarprasController@perbaikanformstatusupdate'); //passing id status perbaikan
    Route::get('/perbaikan/status', 'SarprasController@perbaikanformstatusupdate')->name('sarpras-perbaikan-status'); //form edit status perbaikan
    Route::post('/perbaikan/status', 'SarprasController@perbaikanstatusupdate'); //edit status perbaikan
    Route::get('/perbaikan/aset', 'SarprasController@perbaikanaset')->name('sarpras-perbaikan-aset'); //daftar aset(khusus perbaikan)
    Route::get('/perbaikan/aset/tambah/{id}','SarprasController@perbaikanform'); //passing id tambah perbaikan
    Route::get('/perbaikan/aset/tambah','SarprasController@perbaikanform')->name('sarpras-perbaikan-form'); //form tambah perbaikan
    Route::post('/perbaikan/aset/tambah','SarprasController@perbaikantambah'); //tambah perbaikan
    
    Route::get('/kebutuhan', 'SarprasController@kebutuhan')->name('sarpras-kebutuhan'); //daftar kebutuhan
    Route::get('/kebutuhan/detail/{id}', 'SarprasController@detailkebutuhan'); //detail kebutuhan
    Route::get('/kebutuhan/tambah','SarprasController@kebutuhanform')->name('sarpras-kebutuhan-form'); //form tambah kebutuhan
    Route::post('/kebutuhan/tambah','SarprasController@kebutuhantambah'); //tambah kebutuhan

});


Route::group(['prefix'=>'keuangan','middleware'=>'akses.keuangan'], function() { //admin
    Route::get('/home', 'KeuanganController@dashboard')->name('keuangan-home'); //dashboard

    Route::get('/aset', 'KeuanganController@aset')->name('keuangan-aset'); //daftar aset
    Route::get('/aset/detail/{id}', 'KeuanganController@detailaset'); //detail aset
    
    Route::get('/kebutuhan/status/{id}', 'KeuanganController@kebutuhanformstatusupdate'); //passing id status kebutuhan
    Route::get('/kebutuhan/status', 'KeuanganController@kebutuhanformstatusupdate')->name('keuangan-kebutuhan-status'); //form edit status kebutuhan
    Route::post('/kebutuhan/status', 'KeuanganController@kebutuhanstatusupdate'); //edit status perbaikan
    Route::get('/kebutuhan', 'KeuanganController@kebutuhan')->name('keuangan-kebutuhan'); //daftar kebutuhan
    Route::get('/kebutuhan/detail/{id}', 'KeuanganController@detailkebutuhan'); //detail kebutuhan

});

