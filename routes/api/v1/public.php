<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/4/2017
 * Time: 8:40 AM
 */
$api->post('auth/login', 'Auth\LoginController@login');
$api->post('auth/register', 'Auth\RegisterController@register');