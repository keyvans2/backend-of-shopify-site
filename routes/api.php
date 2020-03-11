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
    Route::post('/{id}', 'cartController@store');
    Route::post('/edit/{id}', 'cartController@edit');
    Route::get('/destroy/{id}', 'cartController@destroy');
    Route::post('/track', 'cartController@track');

});
Route::post('/discount', 'cartController@discount');
Route::post('/payment', 'cartController@payment');

Route::get('/social', 'socialController@index');

Route::group(['prefix' => '/slider'], function () {
    Route::get('/new', 'sliderController@new');
    Route::get('/Bestsellers', 'sliderController@Bestsellers');
});

Route::get('/PhoneAddress', 'phoneaddressController@index');


////////////// Admin Part ////////////////

Route::group(['prefix' => '/admin'], function () {
/////////     roles part

    Route::get('/roles', 'admin\rolesController@index');
    Route::post('/roles', 'admin\rolesController@store');
    Route::get('/roles/{id}', 'admin\rolesController@destroy');
    Route::any('/roles/edit/{id}', 'admin\rolesController@edit');
//////////    Users Part
    Route::get('/users', 'admin\usersController@index');
    Route::post('/users', 'admin\usersController@store');
    Route::get('/users/destroy/{id}', 'admin\usersController@destroy');
    Route::get('/users/edit/{userId}/{roleId}', 'admin\usersController@edit');
    Route::get('/users/count', 'admin\usersController@count');
//////////  Categories Part
    Route::get('/firstcats', 'admin\catsController@firstIndex');
    Route::get('/secondcats', 'admin\catsController@secondIndex');
    Route::post('/firstCatStore', 'admin\catsController@firstCatStore');
    Route::post('/secondCatStore/{id}', 'admin\catsController@secondCatStore');
    Route::get('/firstCatDel/{id}', 'admin\catsController@firstCatDel');
    Route::get('/secondCatDel/{id}', 'admin\catsController@secondCatDel');
    Route::get('/showAllCats', 'admin\catsController@showAllCats');


/////////   products Part
    Route::get('/products', 'admin\productsController@index');
    Route::post('/products/{id}', 'admin\productsController@store');
    Route::get('/products/destroy/{id}', 'admin\productsController@destroy');

//////////   purchases part
    Route::get('/purchases', 'admin\purchasesController@index');
    Route::post('/purchases/edit/{id}', 'admin\purchasesController@edit');
    Route::get('/purchases/sub/{id}', 'admin\purchasesController@subIndex');

});















