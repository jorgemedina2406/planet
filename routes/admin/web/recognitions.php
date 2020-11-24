<?php

/*
|--------------------------------------------------------------------------
| Reconignitions Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Recognition view
    Route::get('reconocimiento/{recognition}', 'Admin\Catalogs\Recognition\RecognitionController@view')->name('countrie.view');

    //Reconignition view
    Route::get('reconocimientos', 'Admin\Catalogs\Recognition\RecognitionController@index')->name('recognitions');

    //Create Recognition
    Route::post('create-recognition', 'Admin\Catalogs\Recognition\RecognitionController@store')->name('create.recognition');

    //Edit Recognition
    Route::get('editar-reconocimiento/{recognition}', 'Admin\Catalogs\Recognition\RecognitionController@show')->name('edit.recognition');
    
    //Update Recognition
    Route::post('update-recognition/{recognition}', 'Admin\Catalogs\Recognition\RecognitionController@update')->name('update.recognition');

    //Delete Recognition
    Route::get('delete-recognition/{recognition}', 'Admin\Catalogs\Recognition\RecognitionController@destroy')->name('delete.recognition');

    //Get Data Recognitions
    Route::post('data-recognition', 'Admin\Catalogs\Recognition\RecognitionController@getDataRecognition')->name('get.data.recognition');

});