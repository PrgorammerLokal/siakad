<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// routes login
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('me', 'AuthController@me');
    $router->post('logout', 'AuthController@logout');
});

// routes register
$router->post('register', 'AuthController@register');

// routes mahasiswa
$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->post('store', 'MahasiswaController@store');
    $router->get('all', 'MahasiswaController@all');
    $router->get('show/{id}', 'MahasiswaController@show');
    $router->put('update/{mahasiswa}', 'MahasiswaController@update');
    $router->delete('destroy/{mahasiswa}', 'MahasiswaController@destroy');
    $router->get('search/{keyword}', 'MahasiswaController@search');
});
