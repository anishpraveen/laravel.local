<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',function () {
    return view('home');
});

Route::get('contact', 'ContactController@contact');
Route::get('me', 'ContactController@me');
Route::get('about', 'PagesController@about');
/*
Route::get('posts', 'PostsController@all');
Route::get('posts/create', 'PostsController@create');

Route::get('posts/{id}', 'PostsController@show');

Route::post('posts','PostsController@store');
*/

Route::resource('posts','PostsController');

/*Route::controllers([
    'auth'=> 'Auth\LoginController',
    'password'=> 'Auth\PasswordController',
]);*/
Auth::routes();

Route::get('/home', 'HomeController@index');
