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


Route::namespace('Api')->group(function() {
    Route::post('login', 'AuthController@login');
    
    Route::get('pizzas', 'PizzaController@getAll');
    Route::get('pizzas/getByCategory/{categoryId}', 'PizzaController@getByCategory');
    Route::get('pizzas/getById/{pizzaId}', 'PizzaController@getById');
    
    Route::post('cart/getInfo', 'CartController@getInfo');
    Route::post('orders', 'OrderController@store');
    
    Route::middleware('auth:api')->group(function () {
        Route::get('fetchUser', 'AuthController@fetchUser');
        Route::get('orders', 'OrderController@index');
    });
});
