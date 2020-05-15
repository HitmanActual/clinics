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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('clinics','ClinicController@index');
    $router->post('clinics','ClinicController@store');
    $router->get('clinics/{clinic}','ClinicController@show');
    $router->put('clinics/{clinic}','ClinicController@update');
    $router->patch('clinics/{clinic}','ClinicController@update');
    $router->delete('clinics/{clinic}','ClinicController@destroy');
});

