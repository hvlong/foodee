<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/4/2017
 * Time: 8:40 AM
 */
$api->get('foods', 'FoodController@index');

$api->post('foods/create', 'FoodController@create');

$api->get('foods/{id}', 'FoodController@show');

$api->post('foods/{id}/edit', 'FoodController@update');

$api->delete('foods/{id}', 'FoodController@delete');
