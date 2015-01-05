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

Route::resource('blog', 'BlogController');

Route::get('/', 'BlogController@index');

Route::get('blog/category/{category_id}', array('as' => 'category_view', 'uses'=>'BlogController@getByCat'));



Route::get('/admin', 'AdminController@index')->before('auth'); 

Route::get('/admin/login', 'AdminController@getLogin');

Route::post('/admin/login', 'AdminController@postLogin');

Route::get('/admin/logout', 'AdminController@getLogout');


Route::resource('admin/posts', 'PostsController');

Route::get('admin/posts', 'PostsController@index')->before('auth');


Route::resource('admin/users', 'UserController');


Route::get('admin/comments/all/', 'CommentController@index')->before('auth');

Route::get('admin/comments/{id}', array('as' => 'post_comments', 'uses'=>'CommentController@getByPost'))->before('auth');

Route::put('admin/comments/{id}', 'CommentController@approve')->before('auth');

Route::delete('admin/comments/{id}', 'CommentController@destroy')->before('auth');


Route::resource('admin/gallery', 'GalleryController');


// listens for any query passed to database for debugging
Event::listen('illuminate.query', function($query) {
	//var_dump($query);
});