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

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'Controller@getAuthUser');
});

Route::get('/', 'Controller@getAllInfo');

//Admin
Route::match(['get', 'post'],'/admin/login', 'AdminController@login');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/users', 'AdminController@getAllUser');
Route::get('/admin/foods', 'AdminController@getAllFood');
Route::match(['get', 'post'],'/admin/addfood', 'AdminController@addFood');
//Route::post('/admin/addfood', function () {
//    request()->file('thumbnail')->store('foods');
//    return back();
//});
