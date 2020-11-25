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
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show');

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
