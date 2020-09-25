<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function ()
{
    Route::get('/Customers', 'CustomersController@show');
    Route::get('/Customers/{id}', 'CustomersController@detail');
    Route::post('/Customers', 'CustomersController@store');
    Route::put('/Customers/{id}', 'CustomersController@update');
    Route::delete('/Customers/{id}', 'CustomersController@destroy');
    
    Route::get('/Orders', 'OrdersController@show');
    Route::get('/Orders/{id}', 'OrdersController@detail');
    Route::post('/Orders', 'OrdersController@store');
    Route::put('/Orders/{id}', 'OrdersController@update');
    Route::delete('/Orders/{id}', 'OrdersController@destroy');
    
    Route::get('/Pembayaran', 'PembayaranController@show');
    Route::get('/Pembayaran/{id}', 'PembayaranController@detail');
    Route::post('/Pembayaran', 'PembayaranController@store');
    Route::put('/Pembayaran/{id}', 'PembayaranController@update');
    Route::delete('/Pembayaran/{id}', 'PembayaranController@destroy');
    
    Route::get('/Product', 'ProductController@show');
    Route::get('/Product/{id}', 'ProductController@detail');
    Route::post('/Product', 'ProductController@store');
    Route::put('/Product/{id}', 'ProductController@update');
    Route::delete('/Product/{id}', 'ProductController@destroy');

});
