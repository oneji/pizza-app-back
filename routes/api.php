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

Route::post('login', 'Api\AuthController@login')->name('api.login');

Route::namespace('Api')->group(function() {
    Route::get('pizzas', 'PizzaController@getAll');
    Route::get('pizzas/getByCategory/{categoryId}', 'PizzaController@getByCategory');
    Route::get('pizzas/getById/{pizzaId}', 'PizzaController@getById');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
