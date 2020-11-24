<?php

/*
|--------------------------------------------------------------------------
| Crs Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Cr view
    Route::get('cr/{cr}', 'Admin\Catalogs\Cr\CrController@view')->name('cr.view');

    //Crs view
    Route::get('cr', 'Admin\Catalogs\Cr\CrController@index')->name('crs');

     //Create Cr
     Route::post('create-cr', 'Admin\Catalogs\Cr\CrController@store')->name('create.cr');

     //Edit Cr
     Route::get('editar-cr/{cr}', 'Admin\Catalogs\Cr\CrController@show')->name('edit.cr');
     
     //Update Cr
     Route::post('update-cr/{cr}', 'Admin\Catalogs\Cr\CrController@update')->name('update.cr');
 
     //Delete Cr
     Route::get('delete-cr/{cr}', 'Admin\Catalogs\Cr\CrController@destroy')->name('delete.cr');

    //Get Data Crs
    Route::post('data-cr', 'Admin\Catalogs\Cr\CrController@getDataCr')->name('get.data.cr');

});