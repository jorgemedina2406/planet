<?php

/*
|--------------------------------------------------------------------------
| Protocols Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Protocol view
    Route::get('protocol/{protocol}', 'Admin\Catalogs\Protocol\ProtocolController@view')->name('protocol.view');

    //Protocols view
    Route::get('protocolos', 'Admin\Catalogs\Protocol\ProtocolController@index')->name('protocols');

     //Create Protocol
     Route::post('create-protocol', 'Admin\Catalogs\Protocol\ProtocolController@store')->name('create.protocol');

     //Edit Protocol
     Route::get('editar-protocolo/{protocol}', 'Admin\Catalogs\Protocol\ProtocolController@show')->name('edit.protocol');
     
     //Update Protocol
     Route::post('update-protocol/{protocol}', 'Admin\Catalogs\Protocol\ProtocolController@update')->name('update.protocol');
 
     //Delete Protocol
     Route::get('delete-protocol/{protocol}', 'Admin\Catalogs\Protocol\ProtocolController@destroy')->name('delete.protocol');

    //Get Data Protocols
    Route::post('data-protocol', 'Admin\Catalogs\Protocol\ProtocolController@getDataProtocol')->name('get.data.protocol');

});