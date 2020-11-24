<?php

/*
|--------------------------------------------------------------------------
| Providers Routes
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

    Route::get('report-provider-excel', function () {
        return Excel::download(new ExportsExport, 'exports.xlsx');
    })->name('report-provider-excel');

    Route::get('report-provider-pdf', function () {
        return Excel::download(new ExportsExport, 'exports.pdf');
    })->name('report-provider-pdf');

    //Provider view
    Route::get('proveedor/{provider}', 'Admin\Catalogs\Provider\ProviderController@view')->name('provider.view');

    //Providers view
    Route::get('proveedores', 'Admin\Catalogs\Provider\ProviderController@index')->name('providers');

    //Create Provider
    Route::post('create-provider', 'Admin\Catalogs\Provider\ProviderController@store')->name('create.provider');

    //Edit Provider
    Route::get('editar-proveedor/{provider}', 'Admin\Catalogs\Provider\ProviderController@show')->name('edit.provider');
    
    //Update Provider
    Route::post('update-provider/{provider}', 'Admin\Catalogs\Provider\ProviderController@update')->name('update.provider');

    //Delete Provider
    Route::get('delete-provider/{provider}', 'Admin\Catalogs\Provider\ProviderController@destroy')->name('delete.provider');

    //Get Data Provider
    Route::post('data-provider', 'Admin\Catalogs\Provider\ProviderController@getDataProvider')->name('get.data.provider');

});