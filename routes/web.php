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

Route::get('/', function () {
    return view('welcom');
})->name('index');

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
    });
});





































// Route::group(['prefix' => '/admin'], function () {
//     Route::group(['prefix' => 'categories'], function () {
//         Route::get('', function () {
//             $list = Category::all();
//             // dd($list);
//             return view('admin/categories/index', ['data' => $list]);
//         })->name('admin.categories.index');
    
//         // create
//         Route::view('create', 'admin.categories.create')->name('admin.categories.create');
    
//         Route::post('store', function () {
    
//             $data = request()->except("_token");
    
    
//             Category::Create($data);
    
//             return redirect()->route('admin.categories.index');
//         })->name('admin.categories.store');
//         // end create
    
//         // edit 
//         Route::get('edit/{id}', function ($id) {
//             $data = Category::find($id);
//             return view('admin/categories/edit', ['data' => $data]);
//         })->name('admin.categories.edit');
//         Route::post('update/{id}', function ($id) {
//             $categories = Category::find($id);
//             $data = request()->except("_token");
    
//             $categories->update($data);
//             return redirect()->route('admin.categories.index');
//         })->name('admin.categories.update');
//         // end edit
    
//         // delete
//         Route::post('delete/{id}', function ($id) {
    
//             $categories = Category::find($id);
//             $categories->delete($id);
//             return redirect()->route('admin.categories.index');
//         })->name('admin.categories.delete');
//     });
//     });

// Route::group(['prefix' => '/admin'], function () {
//     Route::get('products', function () {
//         $list = Product::all();
//         // dd($list);
//         return view('admin/products/index', ['data' => $list]);
//     })->name('admin.products.index');
//     //  Create
//     Route::view('/products/create', '/users/create')->name('admin.products.create');

//     Route::post('products/store', function () {

//         $data = request()->except("_token");


//         Product::Create($data);

//         return redirect()->route('admin.products.index');
//     })->name('admin.products.store');
// });
