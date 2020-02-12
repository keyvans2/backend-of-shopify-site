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

Route::get('/', 'testController@show')->name('index');
Route::get('/test', 'testController@test');
Route::post('/store', 'testController@store');
Route::get('/updatePage/{post}', 'testController@showUpdate');
Route::patch('/update/{post}', 'testController@update');
Route::get('/delete/{post}', 'testController@delete');


Route::get('/fetch', 'testController@fetch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/showProPage', 'productController@index');
Route::get('/showCarts', 'productController@showCarts');
Route::post('/addProduct', 'productController@store');
Route::any('/ToCart', 'productController@ToCart');
Route::get('/delCart', 'productController@delete');
Route::get('/finalize','productController@finalize' )->name('ff');
Route::get('/buyed','productController@buyed' )->name('buyed');
Route::get('/testR/{proCode}','productController@testF');
Route::get('/search','productController@searchView');
Route::get('/goSearch','productController@goSearch');
Route::get('/resultSearch/{id}','productController@resultSearch');
