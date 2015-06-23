<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => '{login}.blog.dev', 'middleware' => 'auth'], function () {
   Route::resource('/auth/blog', 'BlogController');
});

Route::group(['domain' => '{login}.blog.dev'], function () {
    Route::get('/', ['uses' => 'BlogUserController@getIndex', 'as' => 'blog.user.index']);
    Route::get('/blog/{id}', ['uses' => 'BlogUserController@getBlog', 'as' => 'blog.user.blog']);
    Route::get('/post/{id}', ['uses' => 'BlogUserController@getPost', 'as' => 'blog.user.post']);
    Route::get('/tag/{name}', ['uses' => 'BlogUserController@getTag', 'as' => 'blog.user.tag']);
});

Route::group(['domain' => 'blog.dev'], function () {
    Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'blog.index']);
    Route::get('/home', ['uses' => 'HomeController@getHome', 'as' => 'blog.home']);
});

// Auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
