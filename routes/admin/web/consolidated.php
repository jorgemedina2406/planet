<?php

/*
|--------------------------------------------------------------------------
| Currencies Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Exports\ConsolidatedExport;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => 'administracion', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Consolidados']], function () {

    Route::get('report-consolidated-excel', function () {
        return Excel::download(new ConsolidatedExport, 'consolidated.xlsx');
    })->name('report-consolidated-excel');

    // Route::get('report-consolidated-pdf', function () {
    //     return Excel::download(new ConsolidatedExport, 'consolidated.pdf');
    // })->name('report-consolidated-pdf');

    Route::get('report-consolidateds-pdf/{consolidated}', 'Admin\Consolidated\ConsolidatedController@exportPdf')->name('report.consolidateds.pdf')->middleware('role:Administrador|Capturista|Capturista Consolidados|Reporteador');


    //Consolidated view
    Route::get('consolidado/{consolidated}', 'Admin\Consolidated\ConsolidatedController@view')->name('consolidated.view');

    //Consolidated view
    Route::get('consolidados', 'Admin\Consolidated\ConsolidatedController@index')->name('consolidated');

     //Create Consolidated
     Route::get('create-consolidated', 'Admin\Consolidated\ConsolidatedController@create')->name('create.consolidated.view');

     //Create Export
    Route::post('create-consolidated', 'Admin\Consolidated\ConsolidatedController@store')->name('create.consolidated');

     //Edit Consolidated
     Route::get('editar-consolidados/{consolidated}', 'Admin\Consolidated\ConsolidatedController@show')->name('edit.consolidated');
     
     //Update Consolidated
     Route::post('update-consolidated/{consolidated}', 'Admin\Consolidated\ConsolidatedController@update')->name('update.consolidated');
 
     //Delete Consolidated
     Route::get('delete-consolidated/{consolidated}', 'Admin\Consolidated\ConsolidatedController@destroy')->name('delete.consolidated');

    //Get Data Consolidated
    Route::post('data-consolidated', 'Admin\Consolidated\ConsolidatedController@getDataConsolidated')->name('get.data.consolidated');

});