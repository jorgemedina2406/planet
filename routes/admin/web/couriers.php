<?php

/*
|--------------------------------------------------------------------------
| Couriers Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Courier view
    Route::get('courier/{courier}', 'Admin\Catalogs\Courier\CourierController@view')->name('courier.view');

    //Couriers view
    Route::get('couriers', 'Admin\Catalogs\Courier\CourierController@index')->name('couriers');

     //Create Courier
     Route::post('create-courier', 'Admin\Catalogs\Courier\CourierController@store')->name('create.courier');

     //Edit Courier
     Route::get('editar-courier/{courier}', 'Admin\Catalogs\Courier\CourierController@show')->name('edit.courier');
     
     //Update Courier
     Route::post('update-courier/{courier}', 'Admin\Catalogs\Courier\CourierController@update')->name('update.courier');
 
     //Delete Courier
     Route::get('delete-courier/{courier}', 'Admin\Catalogs\Courier\CourierController@destroy')->name('delete.courier');

    //Get Data Couriers
    Route::post('data-courier', 'Admin\Catalogs\Courier\CourierController@getDataCourier')->name('get.data.courier');

});