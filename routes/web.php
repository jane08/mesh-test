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
Route::group(['middleware' => ['web']], function () {
	Route::get('/', [
		'uses' => 'CategoryController@index',
		'as' => 'home'
	]);



	Route::get('/show-products/{category_id?}', [
		'uses' => 'CategoryController@index',
		'as' => 'show-products'
	]);

	Route::get('/get-product/{category_id?}', [
		'uses' => 'CategoryController@products',
		//'as' => 'show-category'
	]);

	Route::get('/show-product/{product_id?}', [
		'uses' => 'CategoryController@singleProduct',
		'as' => 'show-product'
	]);


	Route::get('/products/{category_id?}', [
		'uses' => 'CategoryController@products',
		'as' => 'products'
	]);

	/* other routes */
	Route::get('/about', function () {
		return view('frontend.other.about');
	})->name('about');


	Route::group(['prefix' => 'api', 'namespace' => 'api'], function () {

		Route::get('/categories', [
			'uses' => 'CategoryApiController@index',
			'as' => 'categories'
		]);

		Route::get('/category/{id}', [
			'uses' => 'CategoryApiController@show',
			'as' => 'category'
		]);

		Route::post('/category', [
			'uses' => 'CategoryApiController@store',
			'as' => 'category_store'
		]);

		Route::get('/delete/category/{category_id}', [
			'uses' => 'CategoryApiController@destroy',
			'as' => 'category_delete'
		]);

		Route::get('/category-form/{category_id?}', [
			'uses' => 'CategoryApiController@create',
			'as' => 'category_create'
		]);

		Route::delete('/category/{category_id?}', [
			'uses' => 'CategoryApiController@destroy',
			'as' => 'category_store'
		]);

// products
		Route::get('/products', [
			'uses' => 'ProductApiController@index',
			'as' => 'products'
		]);

		Route::get('/product/{id}', [
			'uses' => 'ProductApiController@show',
			'as' => 'product'
		]);

		Route::post('/product', [
			'uses' => 'ProductApiController@store',
			'as' => 'product_store'
		]);

		Route::put('/product', [
			'uses' => 'ProductApiController@store',
			'as' => 'product_store'
		]);

		Route::get('/product-form/{product_id?}', [
			'uses' => 'ProductApiController@create',
			'as' => 'product_create'
		]);

		Route::get('/delete/product/{id}', [
			'uses' => 'ProductApiController@destroy',
			'as' => 'product_delete'
		]);

	});
});