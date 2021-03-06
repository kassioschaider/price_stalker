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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/price', 'StalkerController@index')->name('list_price');

Route::get('/product', 'ProductController@index')->name('list_product');
Route::get('/product/add', 'ProductController@create')->name('form_add_product');
Route::post('/product/add', 'ProductController@store');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::get('/product/{productId}/analyse', 'AnalyseController@index')->name('list_analyse');
Route::post('/product/{productId}/analyse/add', 'AnalyseController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
