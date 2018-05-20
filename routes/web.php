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
    Route::resource('dategraphic', 'DateGraphicController');

    Route::get('track/delete/{id}', 'TracksController@destroy');
    Route::get('deleteBrigade/{id}', 'BrigadesController@destroy');
    Route::get('brigade/deleteBrigade/{id}', 'BrigadesController@destroy');
    Route::get('driver/deleteDriver/{id}', 'DriverController@destroy');

    Route::get('deleteAll', 'TracksController@deleteAll');
    Route::get('deleteAllBrigades', 'BrigadesController@deleteAll');
    Route::get('deleteAllDrivers', 'DriverController@deleteAll');

    Route::get('archiveGraphic','ArchiveTablesController@archiveGraphic');
    Route::get('archiveBrigades','ArchiveTablesController@archiveBrigades');
    Route::get('archiveDrivers','ArchiveTablesController@archiveDrivers');
});



