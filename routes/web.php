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
    return view('pages.home');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/payment/{id}', 'PemesananController@metodeBayar');
Route::post('/upload-bukti-bayar', 'PemesananController@pay');

Route::get('/home', 'HomeController@index')->name('home');
