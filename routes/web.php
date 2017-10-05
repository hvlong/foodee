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

Route::get('/', 'V1\HomeController@getAllInfo');

//Admin
Route::match(['get', 'post'],'/admin/login', 'V1\AdminController@login');
Route::get('/admin/logout', 'V1\AdminController@logout');

Route::group(['middleware' => 'auth.admin'], function() {
    Route::get('/admin/index', 'V1\AdminController@index');
    Route::get('/admin/users', 'V1\AdminController@getAllUser');
    Route::get('/admin/foods', 'V1\AdminController@getAllFood');
    Route::get('/admin/create-user', 'V1\AdminController@registerUser');
    Route::post('/admin/create-user', 'V1\AdminController@postRegisterUser');
    Route::get('/admin/addfood', 'V1\AdminController@addFood');
    Route::post('/admin/addfood', 'V1\AdminController@postFood');
    Route::get('/admin/food-detail/{id}', 'V1\AdminController@foodDetail');
    Route::get('/admin/edit-food/{id}', 'V1\AdminController@getInfoFood');
    Route::post('/admin/edit-food/{id}', 'V1\AdminController@editFood');
    Route::get('/admin/delete-food/{id}', 'V1\AdminController@deleteFood');
    Route::get('/admin/add-event', 'V1\EventController@addEvent');
    Route::post('/admin/add-event', 'V1\EventController@postEvent');
    Route::get('/admin/events', 'V1\EventController@getAllEvent');
});