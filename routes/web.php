<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('hello');
});
Route::get('/admin/users', function () {
    // dd(123);die;
    $list = DB::table('users')->get();
    // dd($list);
    return view('admin/users/index',['data' => $list]);

});
Route::view('/admin/users/create', '/admin/users/create');

Route::post('/admin/users', function () {
    dd($_REQUEST);
});
Route::view('/test', 'layout'); // gọi thẳng view ra
// - math : ,mapping url với callback tương úng. 