<?php

use Illuminate\Http\Request;

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: *');
// header('Access-Control-Allow-Headers: *');

/*
|--------------------------------------------------------------------------
| API Routes Types
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('products', 'Product\ProductController');
Route::get('properties-archive', 'Property\PropertyController@getPropertiesArchive');
Route::put('update-property/{property}', 'Property\PropertyController@updateProperty');
Route::put('archive-property/{property}', 'Property\PropertyController@archiveProperty');
Route::get('generate-pdf/{property}', 'Property\PropertyController@generatePdf');
Route::post('delete-image/{image}/{property}', 'Property\PropertyController@deleteImage');

// Route::get('vip/properties', 'Property\PropertyController@indexVip')->name('vip');
Route::post('properties/store-property-description', 'Property\PropertyController@storePropertyDescription')->name('propertyDescription');
Route::post('update/picture/{property}', 'Property\PropertyController@updatePicture')->name('update.picture');

Route::get('search-properties/{property}/{type_offer}/{search}', 'Property\PropertyController@searchProperties');