<?php

/*
|--------------------------------------------------------------------------
| Cards Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Card view
    Route::get('carta/{card}', 'Admin\Catalogs\Card\CardController@view')->name('card.view');

    //Card view
    Route::get('cartas', 'Admin\Catalogs\Card\CardController@index')->name('cards');

     //Create Card
     Route::post('create-card', 'Admin\Catalogs\Card\CardController@store')->name('create.card');

     //Edit Card
     Route::get('editar-carta/{card}', 'Admin\Catalogs\Card\CardController@show')->name('edit.card');
     
     //Update Card
     Route::post('update-card/{card}', 'Admin\Catalogs\Card\CardController@update')->name('update.card');
 
     //Delete Card
     Route::get('delete-card/{card}', 'Admin\Catalogs\Card\CardController@destroy')->name('delete.card');

    //Get Data Card
    Route::post('data-card', 'Admin\Catalogs\Card\CardController@getDataCard')->name('get.data.card');

});