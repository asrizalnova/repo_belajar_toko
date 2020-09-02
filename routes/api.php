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
Route::get('/Customers', 'CustomersController@show');
Route::get('/Customers/{id}', 'CustomersController@detail');
Route::post('/Customers', 'CustomersController@store');
Route::put('/Customers/{id}', 'CustomersController@update');

Route::get('/Orders', 'OrdersController@show');
Route::get('/Orders/{id}', 'OrdersController@detail');
Route::post('/Orders', 'OrdersController@store');
Route::put('/Orders/{id}', 'OrdersController@update');

Route::get('/Pembayaran', 'PembayaranController@show');
Route::get('/Pembayaran/{id}', 'PembayaranController@detail');
Route::post('/Pembayaran', 'PembayaranController@store');
Route::put('/Pembayaran/{id}', 'PembayaranController@update');

Route::get('/Product', 'ProductController@show');
Route::get('/Product/{id}', 'ProductController@detail');
Route::post('/Product', 'ProductController@store');
Route::put('/Product/{id}', 'ProductController@update');