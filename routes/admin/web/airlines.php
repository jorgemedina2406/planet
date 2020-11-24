<?php

/*
|--------------------------------------------------------------------------
| Airlines Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Airline view
    Route::get('airline/{airline}', 'Admin\Catalogs\Airline\AirlineController@view')->name('airline.view');

    //Airlines view
    Route::get('airlines', 'Admin\Catalogs\Airline\AirlineController@index')->name('airlines');

     //Create Airline
     Route::post('create-airline', 'Admin\Catalogs\Airline\AirlineController@store')->name('create.airline');

     //Edit Airline
     Route::get('editar-airline/{airline}', 'Admin\Catalogs\Airline\AirlineController@show')->name('edit.airline');
     
     //Update Airline
     Route::post('update-airline/{airline}', 'Admin\Catalogs\Airline\AirlineController@update')->name('update.airline');
 
     //Delete Airline
     Route::get('delete-airline/{airline}', 'Admin\Catalogs\Airline\AirlineController@destroy')->name('delete.airline');

    //Get Data Airlines
    Route::post('data-airline', 'Admin\Catalogs\Airline\AirlineController@getDataAirline')->name('get.data.airlines');

});