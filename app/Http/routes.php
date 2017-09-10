<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index')->name("main");
Route::get('/home', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor");

Route::auth();



Route::group(array('prefix' => 'operator_registrasi','middleware' => ['operator_registrasi']), function(){
	Route::get('/', 'OperatorRegistrasiController@dashboard');
	Route::get('/dashboard', 'OperatorRegistrasiController@dashboard');
	Route::get('/registrasi', 'OperatorRegistrasiController@dashboard');
	Route::get('/form_cetak_kartu', 'OperatorRegistrasiController@dashboard');
	Route::post('/dashboard', 'OperatorRegistrasiController@cari_no_registrasi');
	Route::post('/verifikasi_peserta', 'OperatorRegistrasiController@verifikasi_peserta');
	Route::post('/verifikasi_peserta_valid', 'OperatorRegistrasiController@verifikasi_peserta_valid');

  Route::get('/verifikasi_result', 'OperatorRegistrasiController@verifikasi_result');


	//cetak kartu
	Route::post('/cetak_kartu', 'OperatorRegistrasiController@cetak_kartu');

	//rekap
	Route::get('/rekapitulasi_peserta', 'OperatorRegistrasiController@rekapitulasi_peserta');
  	Route::post('/rekapitulasi_peserta/filter', 'OperatorRegistrasiController@filter_peserta');

  	Route::get('/rekapitulasi_peserta_invalid', 'OperatorRegistrasiController@rekapitulasi_peserta_invalid');
  	Route::post('/rekapitulasi_peserta_invalid/filter', 'OperatorRegistrasiController@filter_peserta_invalid');

  	//CRUD
  	Route::resource('/babak', 'BabakController');
  	Route::get('/babak/delete/{id}','BabakController@destroy');

  	Route::resource('/marhalah', 'MarhalahController');
  	Route::get('/marhalah/delete/{id}','MarhalahController@destroy');

  	Route::resource('/bidang_lomba', 'BidangLombaController');
  	Route::get('/bidang_lomba/delete/{id}','BidangLombaController@destroy');

  	Route::resource('/majelis', 'MajelisController');
  	Route::get('/majelis/delete/{id}','MajelisController@destroy');

});
