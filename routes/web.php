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

Route::post('/cart', [
    'as' => 'cart',
    'uses' => 'CartController@saveCart'
]);

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
