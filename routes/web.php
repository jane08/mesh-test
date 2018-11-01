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
Route::group(['middleware'=>['web']], function(){
Route::get('/',[
    'uses' => 'CategoryController@index',
    'as' => 'home'
]);

/* other routes */
Route::get('/about', function () {
    return view('frontend.other.about');
})->name('about');


Route::group(['prefix'=>'api'], function(){

Route::get('/categories',[
    'uses' => 'CategoryApiController@index',
    'as' => 'categories'
]);

Route::get('/category/{id}',[
    'uses' => 'CategoryApiController@show',
    'as' => 'category'
]);

Route::post('/category',[
    'uses' => 'CategoryApiController@store',
    'as' => 'category_store'
]);

Route::put('/category',[
    'uses' => 'CategoryApiController@store',
    'as' => 'category_delete'
]);

Route::delete('/category/{id}',[
    'uses' => 'CategoryApiController@destroy',
    'as' => 'category_store'
]);

// products
    Route::get('/products',[
        'uses' => 'ProductApiController@index',
        'as' => 'categories'
    ]);

    Route::get('/product/{id}',[
        'uses' => 'ProductApiController@show',
        'as' => 'product'
    ]);

    Route::post('/product',[
        'uses' => 'ProductApiController@store',
        'as' => 'product_store'
    ]);

    Route::put('/product',[
        'uses' => 'ProductApiController@store',
        'as' => 'product_store'
    ]);

    Route::get('/product-form/{product_id?}',[
        'uses' => 'ProductApiController@create',
        'as' => 'product_create'
    ]);

    Route::get('/delete/product/{id}',[
        'uses' => 'ProductApiController@destroy',
        'as' => 'product_delete'
    ]);

});
});