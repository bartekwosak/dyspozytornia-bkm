<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('archiveGraphic', 'ArchiveTablesController@archiveGraphic');
    Route::get('archiveBrigades', 'ArchiveTablesController@archiveBrigades');
    Route::get('archiveDrivers', 'ArchiveTablesController@archiveDrivers');
});

/* API Routes */

Route::get('brigadesApi/{line}/{brigadeVariant}/{change}', function ($line, $brigadeVariant, $change) {
    $brigadeNumber = $line.'/'.$brigadeVariant.'/'.$change;
    $brigade = \App\Brigade::where('numer_brygady',$brigadeNumber)->get();
    return response()->json([$brigadeNumber => $brigade], 200);
});

Route::get('driversApi/drivers', function () {
    $drivers = \App\Driver::all();
    return response()->json($drivers, 200);
});

Route::get('driversApi/{service_number}', function ($service_number) {
    $driver = \App\Driver::where('numer_sluzbowy', $service_number)->get();
    return response()->json([$service_number => $driver], 200);
});

