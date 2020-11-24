<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

    //Logout
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

});

Route::group(['prefix' => '/', 'middleware' => ['guest']], function () {
    
    //Login view
    Route::get('', 'Auth\LoginController@index')->name('login.index');

    //Login post
    Route::post('login', 'Auth\LoginController@login')->name('login');


});