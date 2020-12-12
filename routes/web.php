<?php

use Illuminate\Support\Facades\Route;

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

// Homepage Route
Route::get('/', 'App\Http\Controllers\HomepageController@index');
Route::post('/', 'App\Http\Controllers\HomepageController@store');

// Categories Route
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->middleware(\App\Http\Middleware\DeleteFilters::class);
Route::put('/categories/{id}', 'App\Http\Controllers\CategoryController@update')->middleware(\App\Http\Middleware\DeleteFilters::class);

// Products Route
Route::post('products/', 'App\Http\Controllers\ProductController@store'); // Admin interface
Route::get('/products/list', 'App\Http\Controllers\ProductController@list'); // Admin interface
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show');
Route::get('/products/list/{page}', 'App\Http\Controllers\ProductController@list'); // Admin interface
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy'); // Admin interface
Route::get('products/{product}/edit', 'App\Http\Controllers\ProductController@edit'); // Admin interface
Route::put('/products/remove-image', 'App\Http\Controllers\ProductController@removeImage'); // Admin interface
Route::put('products/{product}', 'App\Http\Controllers\ProductController@update'); // Admin interface
Route::post('/products/product/image-upload', 'App\Http\Controllers\ProductController@imageUpload'); // Admin interface upload image

// Shopping cart review Route
Route::get('/shopping_cart_review', 'App\Http\Controllers\ShoppingCartReviewController@index');
Route::put('/shopping_cart_review/{id}', 'App\Http\Controllers\ShoppingCartReviewController@update');
Route::delete('/shopping_cart_review/{id}', 'App\Http\Controllers\ShoppingCartReviewController@destroy');

// Shopping cart delivery details Route
Route::get('/shopping_cart_delivery_details', 'App\Http\Controllers\ShoppingCartDeliveryDetailController@index');

// Shopping cart delivery payment Route
Route::get('/shopping_cart_delivery_payment', 'App\Http\Controllers\ShoppingCartDeliveryPaymentController@index');
Route::post('/shopping_cart_delivery_payment', 'App\Http\Controllers\ShoppingCartDeliveryPaymentController@store');

// Search
Route::get('/search', 'App\Http\Controllers\SearchController@show')->name('search');

Auth::routes();

Route::get('/cms', function() {
    return view('app');
})->where('cms', '.*');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
