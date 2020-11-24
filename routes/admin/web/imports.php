<?php

/*
|--------------------------------------------------------------------------
| Imports Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Exports\ImportsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => 'administracion', 'middleware' => ['auth']], function () {

    Route::get('report-import-excel', function () {
        return Excel::download(new ImportsExport, 'imports.xlsx');
    })->name('report-import-excel');

    Route::get('report-import-pdf/{import}', 'Admin\Import\ImportController@exportPdf')->name('report.import.pdf')->middleware('role:Administrador|Capturista|Capturista Importacion|Reporteador');
    
    //Delete Evidence
    Route::get('delete-evidence-import/{import}/{evidence}', 'Admin\Import\ImportController@deleteEvidence')->name('delete.evidence.import');

    //Import view
    Route::get('importaciones', 'Admin\Import\ImportController@index')->name('imports')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Create Import View
    Route::get('crear-importacion', 'Admin\Import\ImportController@create')->name('create.import.view')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Create Import
    Route::post('create-import', 'Admin\Import\ImportController@store')->name('create.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Edit Import
    Route::get('editar-importacion/{import}', 'Admin\Import\ImportController@show')->name('edit.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //View Import
    Route::get('importacion/{import}', 'Admin\Import\ImportController@view')->name('view.import')->middleware('role:Administrador|Capturista|Capturista Importacion');
    
    //Update Import
    Route::post('update-import/{import}', 'Admin\Import\ImportController@update')->name('update.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Update Status Import
    Route::post('update-status-import', 'Admin\Import\ImportController@updateStatus')->name('update.status.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Delete Import
    Route::get('delete-import/{import}', 'Admin\Import\ImportController@destroy')->name('delete.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Delete Product Export
    Route::get('delete-product-import/{product}', 'Admin\Import\ImportController@deleteProduct')->name('delete.product.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    //Delete Protocol Import
    Route::get('delete-protocol-import/{protocol}', 'Admin\Import\ImportController@deleteProtocol')->name('delete.protocol.import')->middleware('role:Administrador|Capturista|Capturista Importacion');
    
    //Delete Card Import
    Route::get('delete-card-import/{card}', 'Admin\Import\ImportController@deleteCard')->name('delete.card.import')->middleware('role:Administrador|Capturista|Capturista Importacion');
    
    //Delete Permission Import
    Route::get('delete-permission-import/{permission}', 'Admin\Import\ImportController@deletePermission')->name('delete.permission.import')->middleware('role:Administrador|Capturista|Capturista Importacion');
    
    //Get Data Import
    Route::post('data-import', 'Admin\Import\ImportController@getDataImport')->name('get.data.import')->middleware('role:Administrador|Capturista|Capturista Importacion');

    Route::post('update-reconocimiento/{import}', 'Admin\Import\ImportController@updateRecognition')->name('update.reconocimiento')->middleware('role:Administrador|Capturista|Capturista Importacion');;

});