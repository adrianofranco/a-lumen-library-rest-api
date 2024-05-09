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

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');


$router->group(['middleware' => 'auth:api'], function () use ($router) {

    $router->get('/author', 'AuthorController@index');
    $router->post('/author', 'AuthorController@store');
    $router->put('/author/{id}', 'AuthorController@update');
    $router->delete('/author/{id}', 'AuthorController@destroy');


    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->put('/books/{id}', 'BookController@update');
    $router->delete('/books/{id}', 'BookController@destroy');


    $router->get('/loans', 'LoanController@index');
    $router->post('/loans', 'LoanController@store');
});
