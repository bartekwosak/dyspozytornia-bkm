<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['middleware' => ['web']], function () {
    Auth::routes();
    Route::resource('track', 'TracksController');
    Route::resource('brigade', 'BrigadesController');
    Route::get('delete/{id}', 'TracksController@destroy');
    Route::get('deleteAll', 'TracksController@deleteAll');
    Route::get('deleteAllBrigades', 'BrigadesController@deleteAll');
    Route::get('logout', array('uses' => 'LogoutController@doLogout'));
});



