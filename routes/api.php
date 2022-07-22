<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//merchant routes
Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::group(['middleware' => ['auth:api', 'auth.type:merchant']], function () {
        Route::post('stores/', 'StoresController@store');
        Route::post('products/', 'ProductsController@store');
    });
});


//client routes
Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::group(['middleware' => ['auth:api', 'auth.type:client']], function () {
        Route::post('carts/', 'CartsController@add');
        Route::get('carts/', 'CartsController@get');
    });
});
