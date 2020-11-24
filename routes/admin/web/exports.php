<?php

/*
|--------------------------------------------------------------------------
| Exports Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
use App\Exports\ExportsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => 'administracion', 'middleware' => ['auth']], function () {

    Route::get('report-export-excel', function () {
        return Excel::download(new ExportsExport, 'exports.xlsx');
    })->name('report-export-excel');

    Route::get('report-export-pdf/{export}', 'Admin\Export\ExportController@exportPdf')->name('report.export.pdf')->middleware('role:Administrador|Capturista|Capturista Exportacion|Reporteador');
    
    //Files Evidences
    Route::post('files-evidences', 'Admin\Export\ExportController@filesEvidences')->name('files.evidences');

    //Delete Evidence
    Route::get('delete-evidence/{export}/{evidence}', 'Admin\Export\ExportController@deleteEvidence')->name('delete.evidence');

    //Export view
    Route::get('exportaciones', 'Admin\Export\ExportController@index')->name('exports')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    //Create Export View
    Route::get('crear-exportacion', 'Admin\Export\ExportController@create')->name('create.export.view')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    //Create Export
    Route::post('create-export', 'Admin\Export\ExportController@store')->name('create.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    //Edit Export
    Route::get('editar-exportacion/{export}', 'Admin\Export\ExportController@show')->name('edit.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    //View Export
    Route::get('exportacion/{export}', 'Admin\Export\ExportController@view')->name('view.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Update Export
    Route::post('update-export/{export}', 'Admin\Export\ExportController@update')->name('update.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Update Status Export
    Route::post('update-status-export', 'Admin\Export\ExportController@updateStatus')->name('update.status.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    //Delete Export
    Route::get('delete-export/{export}', 'Admin\Export\ExportController@destroy')->name('delete.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Delete Product Export
    Route::get('delete-product-export/{product}', 'Admin\Export\ExportController@deleteProduct')->name('delete.product.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Delete Protocol Export
    Route::get('delete-protocol-export/{protocol}', 'Admin\Export\ExportController@deleteProtocol')->name('delete.protocol.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Delete Card Export
    Route::get('delete-card-export/{card}', 'Admin\Export\ExportController@deleteCard')->name('delete.card.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Delete Permission Import
    Route::get('delete-permission-export/{permission}', 'Admin\Export\ExportController@deletePermission')->name('delete.permission.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');
    
    //Get Data Export
    Route::post('data-export', 'Admin\Export\ExportController@getDataExport')->name('get.data.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');

    Route::post('update-reconocimiento-exportacion/{export}', 'Admin\Export\ExportController@updateRecognition')->name('update.reconocimiento.export')->middleware('role:Administrador|Capturista|Capturista Exportacion');;

});