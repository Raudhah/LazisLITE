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
Route::get('/trxibrankasku/{trxibrankasku}/printpdf', 'TrxibrankaskuController@showKuitansiPdf');
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

//================ KONFIGURASI
Route::get('/konfigurasi/backup', 'KonfigurasiController@backup');
Route::resource('konfigurasi', 'KonfigurasiController');


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

//========= KUITANSI MASSAL
Route::get('/kuitansimassal', 'KuitansiMassalController@index');
Route::post('/kuitansimassal', 'KuitansiMassalController@tampilkan');

//========= DASHBOARD
Route::get('/dashboard', 'Dashboard@index');

//========= PANDUAN
Route::get('/panduan', 'PanduanController@index');
Route::get('/panduan/daftarisiadmin', 'PanduanController@daftarisiadmin');
Route::get('/panduan/daftarisisuperadmin', 'PanduanController@daftarisisuperadmin');
Route::get('/panduan/trxdonasi', 'PanduanController@trxdonasi');
Route::get('/panduan/trxkotakinfaq', 'PanduanController@trxkotakinfaq');
Route::get('/panduan/trxibrankasku', 'PanduanController@trxibrankasku');
Route::get('/panduan/donatur', 'PanduanController@donatur');
Route::get('/panduan/amil', 'PanduanController@amil');
Route::get('/panduan/peruntukandonasi', 'PanduanController@trxdonasi');
Route::get('/panduan/pekerjaandonatur', 'PanduanController@trxdonasi');
Route::get('/panduan/laporan', 'PanduanController@trxdonasi');
Route::get('/panduan/konfigurasi', 'PanduanController@trxdonasi');
Route::get('/panduan/gantipassword', 'PanduanController@trxdonasi');
Route::get('/panduan/user', 'PanduanController@trxdonasi');
Route::get('/panduan/login', 'PanduanController@trxdonasi');
Route::get('/panduan/logout', 'PanduanController@trxdonasi');

//========= USER 
Route::get('/user', 'UserController@index');
Route::get('/user/gantipassword', 'UserController@gantiPassword');
Route::post('/user/gantipassword', 'UserController@gantiPasswordProses');
Route::get('/user/create', 'UserController@create');
Route::post('/user', 'UserController@store');
Route::get('/user/{user}/delete', 'UserController@delete');
Route::delete('/user/{user}', 'UserController@destroy');


//========= AUTHENTIKASI
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Auth::routes();  //old ones, we dont need this anymore to protect

Route::get('/home', 'Dashboard@index')->name('dashboard');


