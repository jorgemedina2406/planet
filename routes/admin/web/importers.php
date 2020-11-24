<?php

/*
|--------------------------------------------------------------------------
| Consignatories Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Exports\ExportsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    Route::get('report-importer-excel', function () {
        return Excel::download(new ExportsExport, 'exports.xlsx');
    })->name('report-importer-excel');

    Route::get('report-importer-pdf', function () {
        return Excel::download(new ExportsExport, 'exports.pdf');
    })->name('report-importer-pdf');

    //Importer view
    Route::get('importador/{importer}', 'Admin\Catalogs\Importer\ImporterController@view')->name('importer.view');

    //Importers view
    Route::get('importadores', 'Admin\Catalogs\Importer\ImporterController@index')->name('importers');

    //Create Importer
    Route::post('create-importer', 'Admin\Catalogs\Importer\ImporterController@store')->name('create.importer');

    //Edit Importer
    Route::get('editar-importador/{importer}', 'Admin\Catalogs\Importer\ImporterController@show')->name('edit.importer');
    
    //Update Importer
    Route::post('update-importer/{importer}', 'Admin\Catalogs\Importer\ImporterController@update')->name('update.importer');

    //Delete Importer
    Route::get('delete-importer/{importer}', 'Admin\Catalogs\Importer\ImporterController@destroy')->name('delete.importer');

    //Get Data Importer
    Route::post('data-importer', 'Admin\Catalogs\Importer\ImporterController@getDataImporter')->name('get.data.importer');

});