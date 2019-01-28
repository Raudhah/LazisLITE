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


Route::get('/', 'Dashboard@index');



Route::get('/tester', 'AmilController@search');


//================ PERUNTUKAN DONASI
Route::resource('peruntukandonasi', 'peruntukandonasiController');
Route::get('peruntukandonasi/{peruntukandonasi}/delete', 'peruntukandonasiController@delete');

//================ PEKERJAAN DONATUR
Route::resource('pekerjaandonatur', 'PekerjaandonaturController');
Route::get('pekerjaandonatur/{pekerjaandonatur}/delete', 'PekerjaandonaturController@delete');

//================ AMIL
Route::get('/amil/search', 'AmilController@search');
Route::post('/amil/search', 'AmilController@searchResult');
Route::resource('amil', 'AmilController');
Route::get('amil/{amil}/delete', 'AmilController@delete');


//================ DONATUR
Route::get('/donatur/search', 'DonaturController@search');
Route::post('/donatur/search', 'DonaturController@searchResult');
Route::post('/donatur/ajaxsearch', 'DonaturController@donaturAjaxSearch');
Route::resource('donatur', 'DonaturController');
Route::get('donatur/{donatur}/delete', 'DonaturController@delete');

//================ TRX IBRANKASKU
Route::get('/trxibrankasku/search', 'TrxibrankaskuController@search');
Route::post('/trxibrankasku/search', 'TrxibrankaskuController@searchResult');
Route::get('/trxibrankasku/{trxibrankasku}/print', 'TrxibrankaskuController@showKuitansi');
Route::resource('trxibrankasku', 'TrxibrankaskuController');
Route::get('trxibrankasku/{trxibrankasku}/delete', 'TrxibrankaskuController@delete');

//================ TRX KOTAKINFAQ
Route::get('/trxkotakinfaq/search', 'TrxkotakinfaqController@search');
Route::post('/trxkotakinfaq/search', 'TrxkotakinfaqController@searchResult');
Route::get('/trxkotakinfaq/{trxkotakinfaq}/print', 'TrxkotakinfaqController@showKuitansi');
Route::resource('trxkotakinfaq', 'TrxkotakinfaqController');
Route::get('trxkotakinfaq/{trxkotakinfaq}/delete', 'TrxkotakinfaqController@delete');

//================ TRX DONASI
Route::get('/trxdonasi/search', 'TrxdonasiController@search');
Route::post('/trxdonasi/search', 'TrxdonasiController@searchResult');
Route::get('/trxdonasi/{trxdonasi}/print', 'TrxdonasiController@showKuitansi');
Route::resource('trxdonasi', 'TrxdonasiController');
Route::get('trxdonasi/{trxdonasi}/delete', 'TrxdonasiController@delete');

//================ TRX DONASI
Route::get('/konfigurasi/search', 'KonfigurasiController@search');
Route::post('/konfigurasi/search', 'KonfigurasiController@searchResult');
Route::get('/konfigurasi/{konfigurasi}/print', 'KonfigurasiController@showKuitansi');
Route::resource('konfigurasi', 'KonfigurasiController');
Route::get('konfigurasi/{konfigurasi}/delete', 'KonfigurasiController@delete');

//================ LAPORAN
Route::get('/laporan', 'LaporanController@semuaTrx');
Route::get('/laporan/all', 'LaporanController@semuaTrx');
Route::post('/laporan/all', 'LaporanController@semuaTrxProses');
Route::get('/laporan/amil', 'LaporanAmilController@semuaTrx');
Route::post('/laporan/amil', 'LaporanAmilController@semuaTrxProses');
Route::get('/laporan/peruntukandonasi', 'LaporanPeruntukandonasiController@semuaTrx');
Route::post('/laporan/peruntukandonasi', 'LaporanPeruntukandonasiController@semuaTrxProses');
Route::get('/laporan/donatur', 'LaporanDonaturController@semuaTrx');
Route::post('/laporan/donatur', 'LaporanDonaturController@semuaTrxProses');

//========= DASHBOARD
Route::get('/dashboard', 'Dashboard@index');

//========= USER 
Route::get('/user', 'UserController@index');



Auth::routes();

Route::get('/home', 'Dashboard@index')->name('dashboard');


