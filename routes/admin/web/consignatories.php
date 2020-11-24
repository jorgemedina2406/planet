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

    Route::get('report-consignee-excel', function () {
        return Excel::download(new ExportsExport, 'exports.xlsx');
    })->name('report-consignee-excel');

    Route::get('report-consignee-pdf', function () {
        return Excel::download(new ExportsExport, 'exports.pdf');
    })->name('report-consignee-pdf');

    //Consignee view
    Route::get('consignatorio/{consignee}', 'Admin\Catalogs\Consignee\ConsigneeController@view')->name('consignatories.view');

    //Consignatories view
    Route::get('consignatorios', 'Admin\Catalogs\Consignee\ConsigneeController@index')->name('consignatories');

    //Create Consignee
    Route::post('create-consignee', 'Admin\Catalogs\Consignee\ConsigneeController@store')->name('create.consignee');

    //Edit Consignee
    Route::get('editar-consignatorio/{consignee}', 'Admin\Catalogs\Consignee\ConsigneeController@show')->name('edit.consignee');
    
    //Update Consignee
    Route::post('update-consignee/{consignee}', 'Admin\Catalogs\Consignee\ConsigneeController@update')->name('update.consignee');

    //Delete Consignee
    Route::get('delete-consignee/{consignee}', 'Admin\Catalogs\Consignee\ConsigneeController@destroy')->name('delete.consignee');

    //Get Data Consignatories
    Route::post('data-consignee', 'Admin\Catalogs\Consignee\ConsigneeController@getDataConsignee')->name('get.data.consignee');

});