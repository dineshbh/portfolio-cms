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

// FRONT-END
//----------------

//Blog
Route::resource('blog', 'BlogController');
Route::get('/', array('as' => 'home', 'uses'=>'HomeController@index'));
Route::get('blog/category/{category_id}', array('as' => 'blog.index', 'uses'=>'BlogController@getByCat'));

//Porjects
Route::resource('projects', 'ProjectsController');
Route::get('projects/category/{category_id}', array('as' => 'project_category', 'uses'=>'ProjectsController@getByCat'));

//Contact Page
Route::get('about', array('as' => 'about', 'uses'=>'ContactController@getContact'));
Route::post('about', array('as' => 'about', 'uses'=>'ContactController@getContactUsForm'));



// ADMIN
//------------

//Login
Route::get('/admin', 'AdminController@index')->before('auth'); 
Route::get('/admin/login', 'AdminController@getLogin');
Route::post('/admin/login', 'AdminController@postLogin');
Route::get('/admin/logout', 'AdminController@getLogout');

//Posts
Route::resource('admin/posts', 'PostsController');
Route::get('admin/posts', 'PostsController@index')->before('auth');

//Users
Route::resource('admin/users', 'UserController');

//Comments
Route::get('admin/comments/all/', 'CommentController@index')->before('auth');
Route::get('admin/comments/{id}', array('as' => 'post_comments', 'uses'=>'CommentController@getByPost'))->before('auth');
Route::put('admin/comments/{id}', 'CommentController@approve')->before('auth');
Route::delete('admin/comments/{id}', 'CommentController@destroy')->before('auth');

//Gallery
Route::resource('admin/gallery', 'GalleryController');
Route::post('admin/gallery/{id}', array('as' => 'upload', 'uses'=>'GalleryController@uploadImageFile'))->before('auth');


//Debugging
// listens for any query passed to database for debugging
Event::listen('illuminate.query', function($query) {
	//var_dump($query);
});