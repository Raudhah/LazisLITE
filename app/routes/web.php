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



Route::get('/tester', 'peruntukandonasiController@tester');


//================ PERUNTUKAN DONASI

Route::resource('peruntukandonasi', 'peruntukandonasiController');
Route::get('peruntukandonasi/{peruntukandonasi}/delete', 'peruntukandonasiController@delete');


