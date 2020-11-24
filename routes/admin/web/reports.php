<?php

/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/', 'middleware' => ['auth', 'role:Administrador|Capturista|Reporteador|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Edit Tax
    Route::get('crear-reporte', 'Admin\Report\ReportController@index')->name('report');
    
    //Update Tax
    Route::post('generate-report', 'Admin\Report\ReportController@store')->name('create.report');

    //Generate report
    Route::get('export-report', 'Admin\Report\ReportController@exportExcel')->name('export.report.excel');

});