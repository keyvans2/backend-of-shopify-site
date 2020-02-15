<?php

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;
use App\Http\Resources\cartResource as cartR;
use App\Http\Resources\cartProducts as p;

Route::any('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');


Route::get('/firstCat', 'firstCatController@index');


Route::group(['prefix' => '/catsPage/{val}'], function () {
    Route::get('/', 'productsController@index');
    Route::get('/fetchProducts/{id?}', 'productsController@fetch');
});


Route::group(['prefix' => '/cart'], function () {

    Route::get('/', 'cartController@index');
    Route::get('/store/{id}', 'cartController@store');
    Route::get('/edit/{id}', 'cartController@edit');
    Route::get('/destroy/{id}', 'cartController@destroy');
    Route::get('/payment', 'cartController@payment');
    Route::get('/track', 'cartController@track');

});






















