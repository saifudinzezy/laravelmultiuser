<?php
//midleware
Route::get('/', 'HomeController@home');

Route::post('posRegister', 'RegisterController@postRegister');
Route::post('posLogin', 'LoginController@postLogin');
Route::get('register', 'RegisterController@getRegister');
Route::get('login', 'LoginController@getLogin')->name('login');

//membuat fun logout
Route::get('logout', function (){
    //panggil fun Auth logut untk menghapus session
    Auth::logout();
    return 'sukses logout';
});

//membuat fun rule
Route::get('pageAksesKhusus', function (){
    return view('pageAksesKhusus');
});

Route::get('hapus', 'AdminController@hapus');
Route::get('update', 'AdminController@update');