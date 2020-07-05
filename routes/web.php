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

Route::redirect('/', '/store');
Route::redirect('/index', '/store');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');

Route::get('/products', 'ProductController@index')->name('product.index');

Route::post('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
Route::get('/showCart', 'ProductController@showCart')->name('cart.show');

Route::middleware(['auth'])->group(function(){

    Route::get('/checkout/{totalAmount}', 'ProductController@checkout')->name('cart.checkout');
    Route::post('/checkout/charge', 'ProductController@stripeCharge')->name('cart.charge');

});