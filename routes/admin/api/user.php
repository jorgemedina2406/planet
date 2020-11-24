<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes User
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('users', 'User\UserController');
Route::apiResource('users.properties', 'User\UserPropertyController');
Route::put('set-user-admin/{user}', 'User\UserController@setUserAdmin')->name('set.user.admin');
Route::get('index-admin', 'User\UserController@indexAdmin')->name('users.admin');

Route::get('users/verify/{token}', 'User\UserController@verify')->name('verify');
Route::post('ingresar', 'User\UserController@login');
// Route::get('logout', 'Auth\LoginController@logout');
Route::get('usuario/me', 'User\UserController@me');
Route::post('users/refresh', 'User\UserController@refresh')->name('refresh');
Route::post('users/picture-profile/{user}', 'User\UserController@pictureProfile')->name('picture.profile');
Route::post('updateFavorites', 'User\UserController@updateFavorites');
Route::get('getFavorites/{user}', 'User\UserController@getFavorites');

Route::post('social/redirect', 'AuthController@getSocialRedirect')->name('redirectSocialLite');
Route::get('social/handle/{provider}', 'AuthController@getSocialHandle')->name('handleSocialLite');

/** ROUTES ADMIN **/
Route::post('login-admin', 'User\UserController@loginAdmin');
