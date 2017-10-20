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
    Route::get('/majelis/list_peserta/{id}','MajelisController@list_peserta');

    
    Route::post('/no_urut_update/{id}', 'MajelisController@update_no_urut');
    Route::get('/masuk_final/{no_peserta}/{majelis_id}','MajelisController@masuk_final');


});


Route::group(array('prefix' => 'api','middleware' => 'api'), function()
{
    // login

    
    //table master
    Route::get('{TOKEN}/majelis/{TOKEN_MAJELIS}','APIController@getMajelis');
    Route::get('{TOKEN}/peserta','APIController@getPeserta');
    Route::get('{TOKEN}/majelis_peserta/{TOKEN_MAJELIS}','APIController@getMajelisPeserta');

    //post nilai
    Route::post('{TOKEN}/update_nilai','APIController@updateNilai');
    Route::post('{TOKEN}/update_nilai_debat','APIController@updateNilaiDebat');








    Route::get('{TOKEN}/t_pesantren','APISarprasController@getTPesantren');

    Route::get('{TOKEN}/t_sarana/{LAST_UPDATE}','APISarprasController@getTSarana');
    Route::get('{TOKEN}/t_sarana','APISarprasController@getTSarana');

    Route::get('{TOKEN}/t_prasarana/{LAST_UPDATE}','APISarprasController@getTPrasarana');
    Route::get('{TOKEN}/t_prasarana','APISarprasController@getTPrasarana');

    Route::get('{TOKEN}/t_pesantren/{LAST_UPDATE}','APISarprasController@getTPesantren');
    Route::get('{TOKEN}/t_pesantren','APISarprasController@getTPesantren');

    Route::get('{TOKEN}/t_m_flag_sarana/{LAST_UPDATE}','APISarprasController@getTMFlagSarana');
    Route::get('{TOKEN}/t_m_flag_sarana','APISarprasController@getTMFlagSarana');

    Route::get('{TOKEN}/t_m_flag_prasarana/{LAST_UPDATE}','APISarprasController@getTMFlagPrasarana');
    Route::get('{TOKEN}/t_m_flag_prasarana','APISarprasController@getTMFlagPrasarana');

    Route::get('{TOKEN}/t_m_flag_pesantren/{LAST_UPDATE}','APISarprasController@getTMFlagPesantren');
    Route::get('{TOKEN}/t_m_flag_pesantren','APISarprasController@getTMFlagPesantren');


    Route::get('{TOKEN}/t_kabupaten','APISarprasController@getTKabupaten');
    Route::get('{TOKEN}/t_provinsi','APISarprasController@getTProvinsi');

    Route::get('{TOKEN}/t_jenis_prasarana','APISarprasController@getTJenisPrasarana');
    Route::get('{TOKEN}/t_jenis_sarana','APISarprasController@getTJenisSarana');

    Route::get('{TOKEN}/t_potensi_ekonomi','APISarprasController@getTPotensiEkonomi');

    // route for kesantrian (anonymous)
    //Route::get('{TOKEN}/ambil_data/{LAST_UPDATE}','APISarprasController@getSarpras');
    // lapor lembaga (login user)
    Route::post('{TOKEN}/lapor_sarana','APISarprasController@laporSarana');
    Route::post('{TOKEN}/lapor_prasarana','APISarprasController@laporPrasarana');
    // public flag (anonymous)
    Route::post('{TOKEN}/flag_sarana','APISarprasController@publicFlagSarana');
    Route::post('{TOKEN}/flag_prasarana','APISarprasController@publicFlagPrasarana');

    Route::post('{TOKEN}/lapor_pesantren','APISarprasController@laporPesantren');
    // public flag (anonymous)
    Route::post('{TOKEN}/flag_pesantren','APISarprasController@publicFlagPesantren');


    //bookmark sarana
    //set bookmark
    Route::post('{TOKEN}/set_bookmark_sarana','APISarprasController@setBookmarkSarana');

    //unset bookmark
    Route::post('{TOKEN}/un_bookmark_sarana','APISarprasController@unBookmarkSarana');

    //list bookmark
    Route::get('{TOKEN}/ambil_bookmark_sarana/{id_pengguna}/{LAST_UPDATE}','APISarprasController@getBookMarkSarana');
    Route::get('{TOKEN}/ambil_bookmark_sarana/{id_pengguna}','APISarprasController@getBookMarkSarana');

    //bookmark prasarana
    //set bookmark
    Route::post('{TOKEN}/set_bookmark_prasarana','APISarprasController@setBookmarkPrasarana');

    //unset bookmark
    Route::post('{TOKEN}/un_bookmark_prasarana','APISarprasController@unBookmarkPrasarana');

    //list bookmark
    Route::get('{TOKEN}/ambil_bookmark_prasarana/{id_pengguna}/{LAST_UPDATE}','APISarprasController@getBookMarkPrasarana');
    Route::get('{TOKEN}/ambil_bookmark_prasarana/{id_pengguna}','APISarprasController@getBookMarkPrasarana');


    //bookmark pesantren
    //set bookmark
    Route::post('{TOKEN}/set_bookmark_pesantren','APISarprasController@setBookmarkPesantren');

    //unset bookmark
    Route::post('{TOKEN}/un_bookmark_pesantren','APISarprasController@unBookmarkPesantren');

    //list bookmark
    Route::get('{TOKEN}/ambil_bookmark_pesantren/{id_pengguna}/{LAST_UPDATE}','APISarprasController@getBookMarkPesantren');
    Route::get('{TOKEN}/ambil_bookmark_pesantren/{id_pengguna}','APISarprasController@getBookMarkPesantren');

});
