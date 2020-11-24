<?php

/*
|--------------------------------------------------------------------------
| Incoterms Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Incoterm view
    Route::get('incoterm/{incoterm}', 'Admin\Catalogs\Incoterm\IncotermController@view')->name('incoterm.view');

    //Incoterms view
    Route::get('incoterms', 'Admin\Catalogs\Incoterm\IncotermController@index')->name('incoterms');

     //Create Incoterm
     Route::post('create-incoterm', 'Admin\Catalogs\Incoterm\IncotermController@store')->name('create.incoterm');

     //Edit Incoterm
     Route::get('editar-incoterm/{incoterm}', 'Admin\Catalogs\Incoterm\IncotermController@show')->name('edit.incoterm');
     
     //Update Incoterm
     Route::post('update-incoterm/{incoterm}', 'Admin\Catalogs\Incoterm\IncotermController@update')->name('update.incoterm');
 
     //Delete Incoterm
     Route::get('delete-incoterm/{incoterm}', 'Admin\Catalogs\Incoterm\IncotermController@destroy')->name('delete.incoterm');

    //Get Data Incoterms
    Route::post('data-incoterm', 'Admin\Catalogs\Incoterm\IncotermController@getDataIncoterm')->name('get.data.incoterm');

});