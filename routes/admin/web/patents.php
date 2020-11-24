<?php

/*
|--------------------------------------------------------------------------
| Patents Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Patent view
    Route::get('patente/{patent}', 'Admin\Catalogs\Patent\PatentController@view')->name('patent.view');

    //Patents view
    Route::get('patentes', 'Admin\Catalogs\Patent\PatentController@index')->name('patents');

    //Create Patent
    Route::post('create-patent', 'Admin\Catalogs\Patent\PatentController@store')->name('create.patent');

    //Edit Patent
    Route::get('editar-patente/{patent}', 'Admin\Catalogs\Patent\PatentController@show')->name('edit.patent');
    
    //Update Patent
    Route::post('update-patent/{patent}', 'Admin\Catalogs\Patent\PatentController@update')->name('update.patent');

    //Delete Patent
    Route::get('delete-patent/{patent}', 'Admin\Catalogs\Patent\PatentController@destroy')->name('delete.patent');

    //Get Data Patents
    Route::post('data-patent', 'Admin\Catalogs\Patent\PatentController@getDataPatent')->name('get.data.patent');

});