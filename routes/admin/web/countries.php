<?php

/*
|--------------------------------------------------------------------------
| Countries Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Import view
    Route::get('pais/{country}', 'Admin\Catalogs\Country\CountryController@view')->name('countrie.view');

    //Countries view
    Route::get('paises', 'Admin\Catalogs\Country\CountryController@index')->name('countries');

    //Create Country
    Route::post('create-country', 'Admin\Catalogs\Country\CountryController@store')->name('create.country');

    //Edit Country
    Route::get('editar-pais/{country}', 'Admin\Catalogs\Country\CountryController@show')->name('edit.country');
    
    //Update Country
    Route::post('update-country/{country}', 'Admin\Catalogs\Country\CountryController@update')->name('update.country');

    //Delete Country
    Route::get('delete-country/{country}', 'Admin\Catalogs\Country\CountryController@destroy')->name('delete.country');

    //Get Data Countries
    Route::post('data-country', 'Admin\Catalogs\Country\CountryController@getDataCountry')->name('get.data.country');

    //Get Country by Id
    Route::get('get-country-by-id/{country}', 'Admin\Catalogs\Country\CountryController@getCountryById')->name('get.country.by.id');

});