<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/4/2017
 * Time: 8:40 AM
 */
$api->get('foods', 'FoodController@index');

$api->post('foods', 'FoodController@create');

$api->get('foods/{id}', 'FoodController@show');

$api->put('foods', 'FoodController@update');

$api->delete('foods/{id}', 'FoodController@delete');
