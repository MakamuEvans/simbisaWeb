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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('confirm_order/{id}', 'OrderController@confirmOrder')->name('confirm_order');
Route::get('notify_delivery/{id}', 'OrderController@notifyDelivery')->name('notify_delivery');
Route::get('cancel_order/{id}', 'OrderController@cancelOrder')->name('cancel_order');
Route::resource('/user', 'UserController');
Route::resource('/vendor', 'VendorController');
Route::resource('/vendor-location', 'LocationController');
Route::resource('/vendor-menu', 'MenuController');
Route::resource('/client', 'ClientController');
Route::resource('/client', 'ClientController');
Route::resource('/orders', 'OrderController');