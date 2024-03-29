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
    $router->post('/auth/refresh', 'AuthController@refresh');
    //user//
    $router->post('/recovery', 'UserController@recovery');
    $router->put('/reset/{token}', 'UserController@reset');
    $router->get('/check/{token}', 'UserController@check');
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

    $router->get('/bankaccounts', 'BankAccountController@index');
    $router->post('/bankaccount', 'BankAccountController@store');
    $router->put('/bankaccount/{id}', 'BankAccountController@update');

    $router->get('/plans', 'PlanController@index');
    $router->post('/plan', 'PlanController@store');
    $router->put('/plan/{id}', 'PlanController@update');

    $router->get('/credentialinputs', 'CredentialInputController@index');
    $router->post('/credentialinput', 'CredentialInputController@store');
    $router->put('/credentialinput/{id}', 'CredentialInputController@update');

    $router->get('/banks', 'BankController@index');
    $router->post('/bank', 'BankController@store');
    $router->put('/bank/{id}', 'BankController@update');

    $router->get('/clasifications', 'ClasificationController@index');
    $router->post('/clasification', 'ClasificationController@store');
    $router->put('/clasification/{id}', 'ClasificationController@update');

    $router->get('/credentialbanks', 'CredentialBankController@index');
    $router->post('/credentialbank', 'CredentialBankController@store');
    $router->get('/credentialbank/{id}', 'CredentialBankController@show');
    $router->put('/credentialbank/{id}', 'CredentialBankController@update');

    $router->get('/credentials', 'CredentialController@index');
    $router->post('/credential', 'CredentialController@store');
    $router->get('/credential/{id}', 'CredentialController@show');
    $router->put('/credential/{id}', 'CredentialController@update');

    $router->get('/landlords', 'LandlordController@index');
    $router->post('/landlord', 'LandlordController@store');
    $router->get('/landlord/{id}', 'LandlordController@show');
    $router->put('/landlord/{id}', 'LandlordController@update');

    $router->get('/licenses', 'LicenseController@index');
    $router->post('/license', 'LicenseController@store');
    $router->put('/license/{id}', 'LicenseController@update');

    $router->get('/shareholders', 'ShareholderController@index');
    $router->post('/shareholder', 'ShareholderController@store');
    $router->get('/shareholder/{id}', 'ShareholderController@show');
    $router->put('/shareholder/{id}', 'ShareholderController@update');

    $router->get('/corporates', 'CorporateController@index');
    $router->post('/corporate', 'CorporateController@store');
    $router->put('/corporate/{id}', 'CorporateController@update');
    $router->get('/corporate/pdf/{id}', 'CorporateController@print');

    $router->get('/fee/{id}', 'FeeController@show');
    $router->post('/fee', 'FeeController@store');
    $router->put('/fee/{id}', 'FeeController@update');
});

$router->group(['middleware' => ['auth'], 'prefix' => 'api/v1'], function () use ($router) {
    //user//
    $router->post('/user', 'UserController@store');
    $router->get('/user/{id}', 'UserController@show');
    $router->put('/user/{id}', 'UserController@update');
    $router->put('/user/state/{id}', 'UserController@state');
    //office user//
    $router->get('/office/users/{owner}', 'OfficeUserController@user');
    $router->get('/office/users/owner/{user}', 'OfficeUserController@office');
    $router->post('/office/user', 'OfficeUserController@store');
    $router->put('/office/user/{id}', 'OfficeUserController@update');
});

$router->group(['middleware' => ['auth', 'administrator'], 'prefix' => 'api/v1'], function () use ($router) {
    //office//
    $router->get('/offices', 'OfficeController@index');
    $router->post('/office', 'OfficeController@store');
    $router->put('/office/{id}', 'OfficeController@update');
});

$router->group(['middleware' => ['auth', 'office'], 'prefix' => 'api/v1'], function () use ($router) { });
