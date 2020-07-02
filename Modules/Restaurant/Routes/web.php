<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('restaurant')->group(function() {
    Route::prefix('foods')->group(function() {
        Route::get('/', 'FoodsController@index')->name('foods.index');
        Route::get('create','FoodsController@create');
        Route::post('create','FoodsController@store');
    });

    Route::prefix('orders')->group(function() {
        Route::get('/', 'OrdersController@index')->name('orders.index');
        Route::get('create','OrdersController@create');
        Route::post('create','OrdersController@store');
        Route::get('{id}/edit','OrdersController@edit');
        Route::PUT('{id}/edit','OrdersController@update');
    });
    
    Route::POST('/auth','AuthController@authenticate');
    Route::get('user/create','UserController@create');
    Route::get('logout','AuthController@logout');
});
