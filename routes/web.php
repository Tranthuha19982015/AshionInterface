<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as' => 'home',
    'uses' =>'HomeController@index'
]);

Route::get('/category/{id}', [
    'as' => 'category',
    'uses' => 'CategoryController@index'
]);

Route::get('/product-details/{id}', [
    'as' => 'product-details',
    'uses' => 'CategoryController@getDetail'
]);

//cart
Route::get('/cart/{id}', [
    'as' => 'addTocart',
    'uses' => 'CartController@addToCart'
]);

Route::get('/show-cart', [
    'as' => 'showCart',
    'uses' => 'CartController@showCart'
]);

Route::get('/update-cart', [
    'as' => 'updateCart',
    'uses' => 'CartController@updateCart'
]);

Route::get('/delete-cart', [
    'as' => 'deleteCart',
    'uses' => 'CartController@deleteCart'
]);

Route::get('/checkout', [
    'as' => 'checkout',
    'uses' => 'CartController@checkout'
]);

Route::post('/postcheckout', [
    'as' => 'postCheckout',
    'uses' => 'CartController@postCheckout'
]);

//////////////////////

Route::get('/login', [
    'as' => 'login',
    'uses' =>'HomeController@getLogin'
]);

Route::post('/login', [
    'as' => 'login',
    'uses' =>'HomeController@postLogin'
]);

Route::get('/register', [
    'as' => 'register',
    'uses' =>'HomeController@getRegister'
]);

Route::post('/register', [
    'as' => 'register',
    'uses' =>'HomeController@postRegister'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' =>'HomeController@getLogout'
]);

Route::get('/search', [
    'as' => 'search',
    'uses' =>'HomeController@search'
]);
