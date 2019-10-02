<?php

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

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->get('/reset', function () use ($router) {
    return view('email.reset');
});

$router->get('/invitation', function () use ($router) {
    return view('email.invitation');
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    //auth//
    $router->post('/auth', 'AuthController@access');
    //user//
    $router->post('/recovery', 'UserController@recovery');
    $router->put('/reset/{token}', 'UserController@reset');
    $router->put('/activate/{token}', 'UserController@activate');
    //location//    
    $router->get('/location/cities', 'LocationController@city');


    //order
    $router->get('/licensetypes', 'LicenseTypeController@index');
    $router->post('/licensetype', 'LicenseTypeController@store');
    $router->put('/licensetype/{id}', 'LicenseTypeController@update');

    $router->get('/schemes', 'SchemeController@index');
    $router->post('/scheme', 'SchemeController@store');
    $router->put('/scheme/{id}', 'SchemeController@update');

    $router->get('/typecredentials', 'TypeCredentialController@index');
    $router->post('/typecredentials', 'TypeCredentialController@store');
    $router->put('/typecredentials/{id}', 'TypeCredentialController@update');
});

$router->group(['middleware' => ['auth'], 'prefix' => 'api/v1'], function () use ($router) {
    //user//
    $router->post('/user', 'UserController@store');
    $router->get('/user/{id}', 'UserController@find');
    //office user//
    $router->get('/office/users/{owner}', 'OfficeUserController@find');
    $router->post('/office/user', 'OfficeUserController@store');
});

$router->group(['middleware' => ['auth', 'administrator'], 'prefix' => 'api/v1'], function () use ($router) {
    //office//
    $router->get('/offices', 'OfficeController@index');
    $router->post('/office', 'OfficeController@store');
});

$router->group(['middleware' => ['auth', 'office'], 'prefix' => 'api/v1'], function () use ($router) { });
