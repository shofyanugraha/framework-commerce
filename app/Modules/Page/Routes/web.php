<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController@index');
Route::get('/cart', 'PageController@cart');
Route::get('/track-order', 'PageController@trackorder');
Route::get('/track-order/{code}', 'PageController@trackorderGet');
Route::post('/track-order/{code}', 'PageController@postTrackorder');
Route::get('/checkout/{code}', 'PageController@checkout');
Route::get('/order-success/{code}', 'PageController@orderSuccess');
Route::get('/confirmation', 'PageController@confirmation');
Route::get('/{username}/{slug}', 'PageController@sales')->where('username', '^[a-zA-Z_-][a-zA-Z0-9_-]{1,20}+$')->where('slug', '^[a-zA-Z][a-zA-Z0-9_-]{1,50}$');