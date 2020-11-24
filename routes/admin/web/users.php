<?php

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['prefix' => 'administracion', 'middleware' => ['auth', 'role:Administrador']], function () {

    Route::get('report-user-excel', function () {
        return Excel::download(new UsersExport, 'users.xlsx');
    })->name('report-user-excel');

    Route::get('report-user-pdf', function () {
        return Excel::download(new UsersExport, 'users.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    })->name('report-user-pdf');

    //User view
    Route::get('usuario/{user}', 'Admin\User\UserController@view')->name('user.view');
    
    //User view
    Route::get('usuarios', 'Admin\User\UserController@index')->name('users');

    //Create User
    Route::post('create-user', 'Admin\User\UserController@store')->name('create.user');

    //Edit User
    Route::get('editar-usuario/{user}', 'Admin\User\UserController@show')->name('edit.user');
    
    //Update User
    Route::post('update-user/{user}', 'Admin\User\UserController@update')->name('update.user');

    //Delete User
    Route::get('delete-user/{user}', 'Admin\User\UserController@destroy')->name('delete.user');

    //Get Data Export
    Route::post('data-user', 'Admin\User\UserController@getDataUser')->name('get.data.user');

});