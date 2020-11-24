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

    Route::get('report-exporter-excel', function () {
        return Excel::download(new ExportsExport, 'exports.xlsx');
    })->name('report-exporter-excel');

    Route::get('report-exporter-pdf', function () {
        return Excel::download(new ExportsExport, 'exports.pdf');
    })->name('report-exporter-pdf');

    //Country view
    Route::get('exportador/{exporter}', 'Admin\Catalogs\Exporter\ExporterController@view')->name('exporter.view');

    //Consignatories view
    Route::get('exportadores', 'Admin\Catalogs\Exporter\ExporterController@index')->name('exporters');

    //Create Exporter
    Route::post('create-exporter', 'Admin\Catalogs\Exporter\ExporterController@store')->name('create.exporter');

    //Edit Exporter
    Route::get('editar-exportador/{exporter}', 'Admin\Catalogs\Exporter\ExporterController@show')->name('edit.exporter');
    
    //Update Exporter
    Route::post('update-exporter/{exporter}', 'Admin\Catalogs\Exporter\ExporterController@update')->name('update.exporter');

    //Delete Exporter
    Route::get('delete-exporter/{exporter}', 'Admin\Catalogs\Exporter\ExporterController@destroy')->name('delete.exporter');

    //Get Data Exporters
    Route::post('data-exporter', 'Admin\Catalogs\Exporter\ExporterController@getDataExporter')->name('get.data.exporter');
    
    Route::post('get-exporter-by-name', 'Admin\Catalogs\Exporter\ExporterController@getExporterByName')->name('get.exporter.by.name');

});