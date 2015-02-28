<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api/v1'), function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@registration');
    Route::delete('logout', 'Api\AuthController@logout');
    Route::group(array('namespace' => 'Api', 'before' => 'auth.token'), function () {
        Route::resource('certifications', 'CertificationsController', array('only' => array('index', 'show')));
        Route::resource('sessions', 'SessionsController');
        Route::post('sessions/{id}/join', 'SessionsController@joinSession');
        Route::resource('attempts', 'AttemptsController',array('only' => array('index','store','update')));
    });
});