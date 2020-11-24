<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion', 'middleware' => ['auth']], function () {
    
    //Dashboard
    Route::get('dashboard', 'Admin\Dashboard\DashboardController@index')->name('dashboard');

});