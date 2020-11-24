<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Send reset password mail
Route::post('reset-password', 'AuthController@sendPasswordResetLink');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        
// handle reset password form process
Route::post('reset/password', 'AuthController@callResetPassword');

Route::post('forgot/password', 'Auth\ForgotPasswordController@forgot')->name('forgot.password');

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');