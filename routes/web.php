<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Auth::routes();
Route::get('logout', array('uses' => 'LogoutController@doLogout'));

Route::group(['middleware' => ['web']], function () {
    Route::resource('track', 'TracksController');
    Route::resource('brigade', 'BrigadesController');
    Route::resource('driver', 'DriverController');
    Route::get('track/delete/{id}', 'TracksController@destroy');
    Route::get('deleteBrigade/{id}', 'BrigadesController@destroy');
    Route::get('brigade/deleteBrigade/{id}', 'BrigadesController@destroy');
    Route::get('deleteAll', 'TracksController@deleteAll');
    Route::get('deleteAllBrigades', 'BrigadesController@deleteAll');
});



