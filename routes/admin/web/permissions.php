<?php

/*
|--------------------------------------------------------------------------
| Permissions Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth', 'role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Permission view
    Route::get('permiso/{permission}', 'Admin\Catalogs\Permission\PermissionController@view')->name('permission.view');

    //Permission view
    Route::get('permisos', 'Admin\Catalogs\Permission\PermissionController@index')->name('permissions');

     //Create Permission
     Route::post('create-permission', 'Admin\Catalogs\Permission\PermissionController@store')->name('create.permission');

     //Edit Permission
     Route::get('editar-permiso/{permission}', 'Admin\Catalogs\Permission\PermissionController@show')->name('edit.permission');
     
     //Update Permission
     Route::post('update-permission/{permission}', 'Admin\Catalogs\Permission\PermissionController@update')->name('update.permission');
 
     //Delete Permission
     Route::get('delete-permission/{permission}', 'Admin\Catalogs\Permission\PermissionController@destroy')->name('delete.permission');

    //Get Data Permission
    Route::post('data-permission', 'Admin\Catalogs\Permission\PermissionController@getDataPermission')->name('get.data.permission');

});