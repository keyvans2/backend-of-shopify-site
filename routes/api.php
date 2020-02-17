<?php


use App\Phoneandaddress;
use App\Product;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

Route::any('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');


Route::get('/firstCat', 'firstCatController@index');


Route::group(['prefix' => '/catsPage/{val}'], function () {
    Route::get('/', 'productsController@index');
    Route::get('/fetchProducts/{id?}', 'productsController@fetch');
});
Route::get('/productDetail/{id}', function (Product $id) {
    return response()->json([
        "data" => $id
    ]);
});


Route::group(['prefix' => '/cart'], function () {

    Route::get('/', 'cartController@index');
    Route::get('/store/{id}', 'cartController@store');
    Route::get('/edit/{id}', 'cartController@edit');
    Route::get('/destroy/{id}', 'cartController@destroy');
    Route::get('/payment', 'cartController@payment');
    Route::get('/track', 'cartController@track');

});

Route::get('/social', 'socialController@index');

Route::group(['prefix' => '/slider'], function () {
    Route::get('/new', 'sliderController@new');
    Route::get('/Bestsellers', 'sliderController@Bestsellers');
});

Route::get('/PhoneAddress', 'phoneaddressController@index');


//////////////Admin Part////////////////

Route::group(['prefix' => '/admin'], function () {
    Route::get('/firstcats', 'admin\catsController@firstIndex');
    Route::get('/firstCatStore', 'admin\catsController@firstCatStore');
    Route::get('/secondCatStore/{id}', 'admin\catsController@secondCatStore');
    Route::get('/firstCatDel/{id}', 'admin\catsController@firstCatDel');
    Route::get('/secondCatDel/{id}', 'admin\catsController@secondCatDel');
    Route::get('/showAllCats', 'admin\catsController@showAllCats');
});















