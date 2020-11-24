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

    //Edit Tax
    Route::get('editar-impuestos/{tax}', 'Admin\Catalogs\Tax\TaxController@show')->name('edit.tax');
    
    //Update Tax
    Route::post('update-tax/{tax}', 'Admin\Catalogs\Tax\TaxController@update')->name('update.tax');

    //Delete Tax
    Route::get('delete-tax/{tax}', 'Admin\Catalogs\Tax\TaxController@destroy')->name('delete.tax');

});