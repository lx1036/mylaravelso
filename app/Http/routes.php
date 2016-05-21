<?php

//Registration & Authentication
Route::get('login', ['as'=>'auth.login', 'uses'=>'AuthController@getLogin']);
Route::get('register', ['as'=>'auth.register', 'uses'=>'AuthController@getRegister']);
Route::get('logout', ['as'=>'auth.logout', 'uses'=>'AuthController@getLogout']);
Route::get('login/github', ['as'=>'auth.login.github', 'uses'=>'AuthController@getLoginWithGithub']);
Route::post('login', 'AuthController@postLogin');
Route::post('register', 'AuthController@postRegister');

Route::get('/', function () {
    return 'hello laravel';
});
