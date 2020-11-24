<?php

/*
|--------------------------------------------------------------------------
| Currencies Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Currency view
    Route::get('moneda/{currency}', 'Admin\Catalogs\Currency\CurrencyController@view')->name('currency.view');

    //Currencies view
    Route::get('monedas', 'Admin\Catalogs\Currency\CurrencyController@index')->name('currencies');

     //Create Currency
     Route::post('create-currency', 'Admin\Catalogs\Currency\CurrencyController@store')->name('create.currency');

     //Edit Currency
     Route::get('editar-moneda/{currency}', 'Admin\Catalogs\Currency\CurrencyController@show')->name('edit.currency');
     
     //Update Currency
     Route::post('update-currency/{currency}', 'Admin\Catalogs\Currency\CurrencyController@update')->name('update.currency');
 
     //Delete Currency
     Route::get('delete-Currency/{currency}', 'Admin\Catalogs\Currency\CurrencyController@destroy')->name('delete.currency');

    //Get Data Currencies
    Route::post('data-currency', 'Admin\Catalogs\Currency\CurrencyController@getDataCurrency')->name('get.data.currency');

});