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

Route::post('/login', 'Api\AuthController@login');


Route::resource('/products', 'Api\ProductController');
Route::resource('/categories', 'Api\CategoryController');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function(){

    /**
     * API Route for user logout and details.
     **/
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');

    /**
     * API Route for users cart, its details and CRUD Operations.
     **/
    Route::post('/cart/products', 'CartController@store');
    Route::get('/cart', 'CartController@show');
    Route::patch('/cart/product/{id}', 'CartController@update');
    Route::delete('/cart/product/{id}', 'CartController@destroy');
});
