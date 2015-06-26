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

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

// Route des sous domaine
Route::group(['domain' => '{login}.blog.dev'], function () {

    // Route authentifier
    Route::group(['middleware' => 'auth'], function () {

        // Route du panel dashboard
        Route::group(['middleware' => 'auth.my', 'prefix' => 'admin'], function () {
            Route::get('/', ['uses' => 'UserAdminController@getIndex', 'as' => 'blog.user.admin.index']);
            Route::post('/', ['uses' => 'UserAdminController@postBlog', 'as' => 'blog.user.admin.postBlog']);
            Route::post('/edit', ['uses' => 'UserAdminController@putBlog', 'as' => 'blog.user.admin.putBlog']);
            Route::delete('/{id}', ['uses' => 'UserAdminController@deleteBlog', 'as' => 'blog.user.admin.deleteBlog']);

            Route::get('/{id}', ['uses' => 'UserAdminController@getPost', 'as' => 'blog.user.admin.getPost']);
            Route::post('/{id}', ['uses' => 'UserAdminController@postPost', 'as' => 'blog.user.admin.postBlog']);
            Route::post('/{id}/edit', ['uses' => 'UserAdminController@putPost', 'as' => 'blog.user.admin.putPut']);
            Route::delete('/{id}/{postId}', ['uses' => 'UserAdminController@deletePost', 'as' => 'blog.user.admin.deletePost']);

            Route::get('/{id}/{postId}', ['uses' => 'UserAdminController@getComment', 'as' => 'blog.user.admin.getComment']);
            Route::delete('/{id}/{postId}/{commentId}', ['uses' => 'UserAdminController@deleteComment', 'as' => 'blog.user.admin.deleteComment']);
        });

        Route::post('/comment/{id}', ['uses' => 'BlogUserController@postComment', 'as' => 'blog.user.comment.post']);
    });

    Route::get('/', ['uses' => 'BlogUserController@getIndex', 'as' => 'blog.user.index']);
    Route::get('/home', ['uses' => 'HomeController@getHome', 'as' => 'blog.home']);
    Route::get('/blog/{id}', ['uses' => 'BlogUserController@getBlog', 'as' => 'blog.user.blog']);
    Route::get('/post/{id}', ['uses' => 'BlogUserController@getPost', 'as' => 'blog.user.post']);
    Route::get('/tag/{name}', ['uses' => 'BlogUserController@getTag', 'as' => 'blog.user.tag']);
});


// Route de la page d'index
Route::group(['domain' => 'blog.dev'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/follow/{id}', ['uses' => 'HomeController@getFollow', 'as' => 'blog.follow']);
    });

    Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'blog.index']);
    Route::get('/home', ['uses' => 'HomeController@getHome', 'as' => 'blog.home']);
    Route::get('/search', ['uses' => 'HomeController@getSearch', 'as' => 'blog.search']);
});

// Route de connexion et déconnexion
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/language', function() {
    Session::set('locale', Input::get('locale'));
    return Redirect::back();
});
