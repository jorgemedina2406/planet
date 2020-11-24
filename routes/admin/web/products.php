<?php

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administracion/catalogos', 'middleware' => ['auth','role:Administrador|Capturista|Capturista Exportacion|Capturista Importacion|Capturista Consolidados']], function () {

    //Product view
    Route::get('producto/{product}', 'Admin\Catalogs\Product\ProductController@view')->name('product.view');
    
    //Products view
    Route::get('productos', 'Admin\Catalogs\Product\ProductController@index')->name('products');

    //Create Product
    Route::post('create-product', 'Admin\Catalogs\Product\ProductController@store')->name('create.product');

    //Edit Product
    Route::get('editar-producto/{product}', 'Admin\Catalogs\Product\ProductController@show')->name('edit.product');
    
    //Update Product
    Route::post('update-product/{product}', 'Admin\Catalogs\Product\ProductController@update')->name('update.product');

    //Delete Product
    Route::get('delete-product/{product}', 'Admin\Catalogs\Product\ProductController@destroy')->name('delete.product');
    
    //Get Product By Id
    Route::get('get-product-id/{product}', 'Admin\Catalogs\Product\ProductController@getProductById')->name('get.product.id');

    //Get Data Products
    Route::post('data-product', 'Admin\Catalogs\Product\ProductController@getDataProduct')->name('get.data.product');

});