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
    return view('/master/dashboard/index');
});



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
Route::resource('donatur', 'DonaturController');
Route::get('donatur/{donatur}/delete', 'DonaturController@delete');



