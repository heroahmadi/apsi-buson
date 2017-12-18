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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/payment/{id}', 'PemesananController@metodeBayar');
Route::post('/upload-bukti-bayar', 'PemesananController@pay');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mytrip', 'DetailPemesananController@index');
Route::post('/mytrip/get_detail', 'DetailPemesananController@getPesanan');

Route::get('/traffic-feed', 'TrafficFeedController@index');
Route::post('/traffic-feed/post', 'TrafficFeedController@post');

Route::get('/statistic', 'StatisticController@index');

Route::get('/pesan', 'PemesananController@index');
Route::post('/pesan/cari_tiket', 'PemesananController@cariTiket');
Route::post('/pesan/book', 'PemesananController@book');

Route::get('/datapenumpang',function(){
	return view('pages.datapenumpang');
});

Route::post('/admin/get_bukti_bayar', 'AdminController@getBuktiBayar');
Route::post('/admin/confirm', 'AdminController@confirm');