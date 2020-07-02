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

Route::prefix('foods')->group(function() {
    Route::get('/', 'FoodsController@index');
    Route::get('create','FoodsController@create');
    Route::post('create','FoodsController@store');
});
