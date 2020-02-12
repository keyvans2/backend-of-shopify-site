<?php

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;
use App\Http\Resources\cartResource as cartR;

Route::any('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');


Route::get('/firstCat', 'firstCatController@index');


Route::group(['prefix' => '/catsPage/{val}'], function () {
    Route::get('/', 'productsController@index');
    Route::get('/fetchProducts/{id?}', 'productsController@fetch');
});

Route::get('/cart', function () {
    $find = User::find(1)->carts;
    return $find;

});
