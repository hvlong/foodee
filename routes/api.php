<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\V1'], function ($api) {
    require __DIR__ . '/api/v1/public.php';
});

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\V1',
    'middleware' => 'jwt.auth'], function ($api) {
    require __DIR__ . '/api/v1/private_admin.php';
});


//Route::post('auth/register', 'Controller@register');
//Route::post('auth/login', 'Controller@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'Controller@getAuthUser');
    Route::post('/admin/addfood', 'FoodController@postFood');
});
