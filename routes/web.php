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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index');

// Admin panel routes
Route::get('/admin/products/add', 'AdminProductsController@addProductForm')->name('admin_products_add_form');
Route::post('/admin/products/add', 'AdminProductsController@addProductAction')->name('admin_products_add_action');
Route::get('/admin/products', 'AdminProductsController@listProducts')->name('admin_products_list');
Route::get('/admin/products/edit/{id}', 'AdminProductsController@updateProductForm')->name('admin_products_update_form');
Route::post('/admin/products/edit/{id}', 'AdminProductsController@updateProductAction')->name('admin_products_update_action');
Route::get('/products', 'ProductsController@all')->name('products');
Route::get('/products/category/{id}', 'ProductsController@category')->name('products_category');
Route::get('/products/category/{id},{sortingField},{sortingType}', 'ProductsController@category')->name('products_category_sorting');
Route::get('/products/{id}', 'ProductsDetailsController@productsDetails')->name('products_details');
