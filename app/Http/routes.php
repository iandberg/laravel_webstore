<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

// 	=-=-=-=-=-=-=-[ products ]=-=-=-=-=-=-=-

	Route::get('/', 'ProductsController@index');
	Route::get('/products/{id}', 'ProductsController@single');
	
	
// =-=-=-=-=-=-=-[ cart items ]=-=-=-=-=-=-=-	

	Route::post('/cartitem/{id}/new', 'CartItemsController@new');
	Route::post('/cartitem/delete', 'CartItemsController@delete');
	
// =-=-=-=-=-=-=-[ cart ]=-=-=-=-=-=-=-
	
	Route::get('/cart', 'CartsController@index');
	Route::get('/cart/new', 'CartItemsController@seesess');

});
