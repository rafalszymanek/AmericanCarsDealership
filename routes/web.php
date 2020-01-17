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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile.show');
Route::get('/retailer', 'RetailerController@index')->name('retailer.show');
#Route::get('/retailer/{order}', 'RetailerController@edit')->name('retailer.edit');
Route::patch('/retailer', 'RetailerController@update')->name('retailer.update');

// Admin panel routes
Route::get('/admin/products/add', 'AdminProductsController@addProductForm')->name('admin_products_add_form');
Route::post('/admin/products/add', 'AdminProductsController@addProductAction')->name('admin_products_add_action');
Route::get('/admin/products', 'AdminProductsController@listProducts')->name('admin_products_list');
Route::get('/admin/products/edit/{id}', 'AdminProductsController@updateProductForm')->name('admin_products_update_form');
Route::post('/admin/products/edit/{id}', 'AdminProductsController@updateProductAction')->name('admin_products_update_action');

// Products routes
Route::get('/products', 'ProductsController@all')->name('products');
Route::get('/products/category/{id}', 'ProductsController@category')->name('products_category');
Route::get('/products/category/{id},{sortingField},{sortingType}', 'ProductsController@category')->name('products_category_sorting');
Route::get('/products/{id}', 'ProductsController@details')->name('products_details');

// Transaction routes
Route::get('/checkout', 'CheckoutController@viewOrder')->name('checkout_view');
Route::post('/checkout', 'CheckoutController@sendOrder')->name('checkout_send');
Route::get('/basket', 'BasketController@list')->name('basket_list');
Route::get('/basket/add/{productId}', 'BasketController@add')->name('basket_add');
Route::get('/basket/remove/{productId}', 'BasketController@remove')->name('basket_remove');
