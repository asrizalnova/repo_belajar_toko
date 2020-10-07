<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::group(['middleware' => ['api.superadmin']], function ()
    {
        Route::delete('/Customers/{id}', 'CustomersController@destroy');
        Route::delete('/Orders/{id}', 'OrdersController@destroy');
        Route::delete('/Pembayaran/{id}', 'PembayaranController@destroy');
        Route::delete('/Product/{id}', 'ProductController@destroy');
    });

    Route::group(['middleware' => ['api.admin']], function ()
    {
        Route::post('/Customers', 'CustomersController@store');
        Route::put('/Customers/{id}', 'CustomersController@update');

        Route::post('/Orders', 'OrdersController@store');
        Route::put('/Orders/{id}', 'OrdersController@update');

        Route::post('/Pembayaran', 'PembayaranController@store');
        Route::put('/Pembayaran/{id}', 'PembayaranController@update');

        Route::post('/Product', 'ProductController@store');
        Route::put('/Product/{id}', 'ProductController@update');
    });


    Route::get('/Customers', 'CustomersController@show');
    Route::get('/Customers/{id}', 'CustomersController@detail');
   
   
    
    Route::get('/Orders', 'OrdersController@show');
    Route::get('/Orders/{id}', 'OrdersController@detail');
   
   
    
    Route::get('/Pembayaran', 'PembayaranController@show');
    Route::get('/Pembayaran/{id}', 'PembayaranController@detail');
   
   
    
    Route::get('/Product', 'ProductController@show');
    Route::get('/Product/{id}', 'ProductController@detail');
    
    
}
);
