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

//Home page
Route::get('/', 'Site\HomeController@index');

//Admin
Route::get('/admin/logout', 'Site\Auth\LogoutController@logout');
Route::get('/admin/login', 'Site\Auth\LoginController@login');
Route::post('/admin/login', 'Site\Auth\LoginController@login');

Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function() {

    Route::get('users', 'Site\UserController@index');

    Route::get('foods', 'Site\FoodController@index');
    Route::get('foods/create', 'Site\FoodController@create');
    Route::post('foods/create', 'Site\FoodController@store');
    Route::get('foods/{id}', 'Site\FoodController@show');
    Route::get('foods/{id}/edit', 'Site\FoodController@edit');
    Route::put('foods/{id}', 'Site\FoodController@update');
    Route::delete('foods/{id}', 'Site\FoodController@destroy');

    Route::get('events', 'Site\EventController@index');
    Route::get('events/create', 'Site\EventController@create');
    Route::post('events/create', 'Site\EventController@store');
});