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



Route::get('admin/comments/approved', 'CommentController@approved')->before('auth');

Route::get('admin/comments/unapproved', 'CommentController@unapproved')->before('auth');

Route::put('admin/comments/{id}', 'CommentController@approve')->before('auth');

Route::resource('admin/comments', 'CommentController');


// listens for any query passed to database for debugging
Event::listen('illuminate.query', function($query) {
	//var_dump($query);
});