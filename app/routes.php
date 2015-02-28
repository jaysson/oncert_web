<?php

Route::get('/', 'HomeController@show');
Route::get('register', array('as' => 'register.page', 'uses' => 'AuthController@register'));
Route::post('register', array('as' => 'register', 'uses' => 'AuthController@processRegister'));
Route::get('login', array('as' => 'login.page', 'uses' => 'AuthController@login'));
Route::post('login', array('as' => 'login', 'uses' => 'AuthController@processLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

Route::group(array('prefix' => 'api/v1'), function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@registration');
    Route::delete('logout', 'Api\AuthController@logout');
    Route::group(array('namespace' => 'Api', 'before' => 'auth.token'), function () {
        Route::resource('certifications', 'CertificationsController', array('only' => array('index', 'show')));
        Route::resource('sessions', 'SessionsController');
        Route::post('sessions/{id}/join', 'SessionsController@joinSession');
        Route::resource('attempts', 'AttemptsController', array('only' => array('index', 'store', 'update')));
    });
});

Route::get('dashboard', ['uses' => 'DashboardController@show', 'as' => 'dashboard']);
Route::resource('certifications', 'CertificationsController', ['only' => ['index', 'show']]);
Route::resource('certifications.sessions', 'SessionsController');
Route::get('join-session/{id}', ['uses' => 'SessionsController@join', 'as' => 'join-session']);

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin'), function () {
    Route::get('/', ['uses' => 'DashboardController@show', 'as' => 'dashboard']);
    Route::resource('certifications', 'CertificationsController');
});
