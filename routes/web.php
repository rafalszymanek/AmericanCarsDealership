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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', 'Controller@test');
Route::get('/test2', 'Controller@test2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin panel routes
Route::get('/admin/products/add', 'AdminProductsController@addProductForm')->name('admin_products_add_form');
Route::post('/admin/products/add', 'AdminProductsController@addProductAction')->name('admin_products_add_action');
//Route::get('/item/{id}', 'ItemsController@index')->name('item.show');
//Route::get('/item/{id}', 'ItemsController@itemDetails')->name('item.show');
