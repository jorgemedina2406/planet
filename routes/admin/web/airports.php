<?php

/*
|--------------------------------------------------------------------------
| Airports Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Airport view
    Route::get('aeropuerto/{airport}', 'Admin\Catalogs\Airport\AirportController@view')->name('countrie.view');

    //Airports view
    Route::get('aeropuertos', 'Admin\Catalogs\Airport\AirportController@index')->name('airports');

    //Create Airport
    Route::post('create-airport', 'Admin\Catalogs\Airport\AirportController@store')->name('create.airport');

    //Edit Airport
    Route::get('editar-aeropuerto/{airport}', 'Admin\Catalogs\Airport\AirportController@show')->name('edit.airport');
    
    //Update Airport
    Route::post('update-airport/{airport}', 'Admin\Catalogs\Airport\AirportController@update')->name('update.airport');

    //Delete Airport
    Route::get('delete-airport/{airport}', 'Admin\Catalogs\Airport\AirportController@destroy')->name('delete.airport');

    //Get Data Airports
    Route::post('data-airport', 'Admin\Catalogs\Airport\AirportController@getDataAirport')->name('get.data.airport');

});