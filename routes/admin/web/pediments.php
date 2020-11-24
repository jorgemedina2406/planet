<?php

/*
|--------------------------------------------------------------------------
| Pediments Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Pediment view
    Route::get('pedimento/{pediment}', 'Admin\Catalogs\Pediment\PedimentController@view')->name('pediment.view');

    //Pediments view
    Route::get('pedimentos', 'Admin\Catalogs\Pediment\PedimentController@index')->name('pediments');

    //Create Pediment
    Route::post('create-pediment', 'Admin\Catalogs\Pediment\PedimentController@store')->name('create.pediment');

    //Edit Pediment
    Route::get('editar-pedimento/{pediment}', 'Admin\Catalogs\Pediment\PedimentController@show')->name('edit.pediment');
    
    //Update Pediment
    Route::post('update-pediment/{pediment}', 'Admin\Catalogs\Pediment\PedimentController@update')->name('update.pediment');

    //Delete Pediment
    Route::get('delete-pediment/{pediment}', 'Admin\Catalogs\Pediment\PedimentController@destroy')->name('delete.pediment');

    //Get Data Pediments
    Route::post('data-pediment', 'Admin\Catalogs\Pediment\PedimentController@getDataPediment')->name('get.data.pediment');

});