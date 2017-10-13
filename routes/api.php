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

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
    require __DIR__ . '/api/v1/public.php';
});

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => 'jwt.auth'], function ($api) {
    require __DIR__ . '/api/v1/private_admin.php';
});

Route::get('test', function () {
   return 'test';
});