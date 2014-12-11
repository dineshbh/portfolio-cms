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
Route::get('/admin', function() 
{
	$posts = Post::orderBy('id','desc')->paginate(10);
	return View::make('admin.posts.index')->withPosts($posts);
});


Route::resource('blog', 'BlogController');

Route::get('/', 'BlogController@index');

Route::get('blog/category/{category_id}', array('as' => 'category_view', 'uses'=>'BlogController@getByCat'));


Route::resource('admin/posts', 'PostsController');

Route::get('admin/posts', 'PostsController@index');



// listens for any query passed to database for debugging
Event::listen('illuminate.query', function($query) {
	//var_dump($query);
});