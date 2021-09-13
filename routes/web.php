<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
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

// frontend
Route::get('/', 'frontend\index@index')->name('frontend.index');
Route::get('/product', 'frontend\index@product')->name('frontend.product');
Route::get('/detail/{id}', 'frontend\index@detail')->name('frontend.detail');

    Route::group([
        'middleware' => 'check_login',
        'as' => 'frontend.',
        'namespace' => 'frontend',
    ], function () {
Route::get('/add_cart/{id}', 'index@addcart')->name('add_cart');
Route::get('/cart', 'index@cart')->name('cart');
Route::get('/save_cart', 'index@save_cart')->name('save_cart');
Route::get('/delete_cart', 'index@delete_cart')->name('delete_cart');

    });


// Đăng Nhập

Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

// end

// admin
Route::group(['middleware' => 'check_login',], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
    ], function () {

        // Người dùng

        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
            'middleware' => 'check_admin',
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create');
            Route::get('/{user}', 'UserController@show')->name('show');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('edit/{id}', 'UserController@edit')->name('edit');
            Route::post('update/{user}', 'UserController@update')->name('update');
            Route::post('delete/{id}', 'UserController@delete')->name('delete');
        });

        //  Danh Mục

        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.'
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('update/{id}', 'CategoryController@update')->name('update');
            Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
        });

        //  Sản Phẩm

        Route::group([
            'prefix' => 'products',
            'as' => 'products.'
        ], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('create', 'ProductController@create')->name('create');
            Route::post('store', 'ProductController@store')->name('store');
            Route::get('edit/{id}', 'ProductController@edit')->name('edit');
            Route::post('update/{id}', 'ProductController@update')->name('update');
            Route::post('delete/{id}', 'ProductController@delete')->name('delete');
        });

        // Hóa đơn

        Route::group([
            'prefix' => 'invoices',
            'as' => 'invoices.'
        ], function () {
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::get('create', 'InvoiceController@create')->name('create');
            Route::get('/{id}', 'InvoiceController@show')->name('show');
            Route::post('store', 'InvoiceController@store')->name('store');
            Route::get('edit/{id}', 'InvoiceController@edit')->name('edit');
            Route::post('update/{id}', 'InvoiceController@update')->name('update');
            Route::post('delete/{id}', 'InvoiceController@delete')->name('delete');

        });
    });
});





































