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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/vendor-api/index', 'Api\VendorApi@index');
Route::get('/vendor-api/menu/{id}', 'Api\VendorApi@show');
Route::get('/location-api/locations/', 'Api\LocationApi@getLocations');
Route::post('/order-api/order/', 'Api\OrderController@order');
Route::get('/order-api/history/{phone}', 'Api\OrderController@orderHistory');
