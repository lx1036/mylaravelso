<?php

//Registration & Authentication
Route::get('login', ['as'=>'auth.login', 'uses'=>'AuthController@getLogin']);
Route::post('login', 'AuthController@postLogin');
Route::get('register', ['as'=>'auth.register', 'uses'=>'AuthController@getRegister']);
Route::post('register', 'AuthController@postRegister');
Route::get('logout', ['as'=>'auth.logout', 'uses'=>'AuthController@getLogout']);
Route::get('login/github', ['as'=>'auth.login.github', 'uses'=>'AuthController@getLoginWithGithub']);

//User Profile Route
Route::get('user', ['as'=>'user.index', 'uses'=>'UserController@getIndex']);

Route::get('/', ['as'=>'browse.recent', 'uses'=>'BrowseController@getBrowseRecent']);
Route::get('/popular', ['as'=>'browse.popular', 'uses'=>'BrowseController@getBrowsePopular']);
Route::get('/comments', ['as'=>'browse.comments', 'uses'=>'BrowseController@getBrowseComments']);
Route::get('/about', ['as'=>'about', 'uses'=>'HomeController@getAbout']);
