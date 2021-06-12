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
    Route::get('/home/dashboard', 'SarprasController@dashboard')->name('sarpras-home'); //dashboard

    Route::get('/home/user', 'SarprasController@user')->name('sarpras-user');
    Route::get('/home/user/tambah','SarprasController@userform')->name('sarpras-user-form'); //form tambah user
    Route::post('/home/user/tambah','SarprasController@usertambah'); //tambah user

    Route::get('/home/aset', 'SarprasController@aset')->name('sarpras-aset'); //daftar aset
    Route::get('/home/aset/detail/{id}', 'SarprasController@detailaset'); //detail aset
    Route::get('/home/aset/edit/{id}','SarprasController@formupdateaset'); //passing id edit aset
    Route::get('/home/aset/edit','SarprasController@formupdateaset')->name('sarpras-aset-form-edit'); //form edit aset
    Route::post('/home/aset/edit','SarprasController@editupdateaset'); //edit aset
    Route::get('/home/aset/hapus/{id}','SarprasController@deleteaset'); // hapus aset
    Route::get('/home/aset/tambah','SarprasController@asetform')->name('sarpras-aset-form'); //form tambah aset
    Route::post('/home/aset/tambah','SarprasController@asettambah'); //tambah aset
    Route::get('/home/aset/print', 'SarprasController@printaset')->name('print-aset'); //print aset

    Route::get('/home/ruang', 'SarprasController@ruang')->name('sarpras-ruang');
    Route::get('/home/ruang/edit/{id}','SarprasController@formupdateruang'); //passing id edit ruang
    Route::get('/home/ruang/edit','SarprasController@formupdateruang')->name('sarpras-ruang-form-edit'); //form edit ruang
    Route::post('/home/ruang/edit','SarprasController@editupdateruang'); //edit ruang
    Route::get('/home/ruang/tambah','SarprasController@ruangform')->name('sarpras-ruang-form'); //form tambah ruang
    Route::post('/home/ruang/tambah','SarprasController@ruangtambah'); //tambah ruang

    Route::get('/home/jenis', 'SarprasController@jenis')->name('sarpras-jenis');
    Route::get('/home/jenis/edit/{id}','SarprasController@formupdatejenis'); //passing id edit jenis
    Route::get('/home/jenis/edit','SarprasController@formupdatejenis')->name('sarpras-jenis-form-edit'); //form edit jenis
    Route::post('/home/jenis/edit','SarprasController@editupdatejenis'); //edit jenis
    Route::get('/home/jenis/tambah','SarprasController@jenisform')->name('sarpras-jenis-form'); //form tambah jenis
    Route::post('/home/jenis/tambah','SarprasController@jenistambah'); //tambah jenis

    Route::get('/home/perbaikan', 'SarprasController@perbaikan')->name('sarpras-perbaikan'); //daftar perbaikan
    Route::get('/home/perbaikan/detail/{id}', 'SarprasController@detailperbaikan'); //detail perbaikan
    Route::get('/home/perbaikan/status/{id}', 'SarprasController@perbaikanformstatusupdate'); //passing id status perbaikan
    Route::get('/home/perbaikan/status', 'SarprasController@perbaikanformstatusupdate')->name('sarpras-perbaikan-status'); //form edit status perbaikan
    Route::post('/home/perbaikan/status', 'SarprasController@perbaikanstatusupdate'); //edit status perbaikan
    Route::get('/home/perbaikan/aset', 'SarprasController@perbaikanaset')->name('sarpras-perbaikan-aset'); //daftar aset(khusus perbaikan)
    Route::get('/home/perbaikan/aset/tambah/{id}','SarprasController@perbaikanform'); //passing id tambah perbaikan
    Route::get('/home/perbaikan/aset/tambah','SarprasController@perbaikanform')->name('sarpras-perbaikan-form'); //form tambah perbaikan
    Route::post('/home/perbaikan/aset/tambah','SarprasController@perbaikantambah'); //tambah perbaikan
    Route::get('/home/perbaikan/print', 'SarprasController@printperbaikan')->name('print-perbaikan'); //print perbaikan
    
    Route::get('/home/kebutuhan', 'SarprasController@kebutuhan')->name('sarpras-kebutuhan'); //daftar kebutuhan
    Route::get('/home/kebutuhan/detail/{id}', 'SarprasController@detailkebutuhan'); //detail kebutuhan
    Route::get('/home/kebutuhan/tambah','SarprasController@kebutuhanform')->name('sarpras-kebutuhan-form'); //form tambah kebutuhan
    Route::post('/home/kebutuhan/tambah','SarprasController@kebutuhantambah'); //tambah kebutuhan
    Route::get('/home/kebutuhan/print', 'SarprasController@printkebutuhan')->name('print-kebutuhan'); //print kebutuhan

});


Route::group(['prefix'=>'keuangan','middleware'=>'akses.keuangan'], function() { //admin
    Route::get('/home', 'KeuanganController@dashboard')->name('keuangan-home'); //dashboard

    Route::get('/home/aset', 'KeuanganController@aset')->name('keuangan-aset'); //daftar aset
    Route::get('/home/aset/detail/{id}', 'KeuanganController@detailaset'); //detail aset
    
    Route::get('/home/kebutuhan/status/{id}', 'KeuanganController@kebutuhanformstatusupdate'); //passing id status kebutuhan
    Route::get('/home/kebutuhan/status', 'KeuanganController@kebutuhanformstatusupdate')->name('keuangan-kebutuhan-status'); //form edit status kebutuhan
    Route::post('/home/kebutuhan/status', 'KeuanganController@kebutuhanstatusupdate'); //edit status perbaikan
    
    Route::get('/home/kebutuhan/status/selesai/{id}', 'KeuanganController@kebutuhanformstatusupdateselesai'); //passing id status kebutuhan selesai
    Route::get('/home/kebutuhan/status/selesai', 'KeuanganController@kebutuhanformstatusupdateselesai')->name('keuangan-kebutuhan-status-selesai'); //form edit status kebutuhan selesai
    Route::post('/home/kebutuhan/status/selesai', 'KeuanganController@kebutuhanstatusupdateselesai'); //edit status perbaikan selesai

    Route::get('/home/kebutuhan', 'KeuanganController@kebutuhan')->name('keuangan-kebutuhan'); //daftar kebutuhan
    Route::get('/home/kebutuhan/detail/{id}', 'KeuanganController@detailkebutuhan'); //detail kebutuhan
    Route::get('/home/kebutuhan/print', 'KeuanganController@printkebutuhan')->name('keuangan-print-kebutuhan'); //print kebutuhan

});


Route::group(['prefix'=>'unitkerja','middleware'=>'akses.unitkerja'], function() { //admin
    Route::get('/home', 'UnitkerjaController@dashboard')->name('unitkerja-home'); //dashboard
    
    Route::get('/home/perbaikan', 'UnitkerjaController@perbaikan')->name('unitkerja-perbaikan'); //daftar perbaikan
    Route::get('/home/perbaikan/detail/{id}', 'UnitkerjaController@detailperbaikan'); //detail perbaikan
    Route::get('/home/perbaikan/aset', 'UnitkerjaController@perbaikanaset')->name('unitkerja-perbaikan-aset'); //daftar aset(khusus perbaikan)
    Route::get('/home/perbaikan/aset/tambah/{id}','UnitkerjaController@perbaikanform'); //passing id tambah perbaikan
    Route::get('/home/perbaikan/aset/tambah','UnitkerjaController@perbaikanform')->name('unitkerja-perbaikan-form'); //form tambah perbaikan
    Route::post('/home/perbaikan/aset/tambah','UnitkerjaController@perbaikantambah'); //tambah perbaikan
    Route::get('/home/perbaikan/print', 'UnitkerjaController@printperbaikan')->name('unitkerja-print-perbaikan'); //print perbaikan

});

