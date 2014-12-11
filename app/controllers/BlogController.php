<?php

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$categories = Category::all();
		$posts = Post::orderBy('id','desc')->paginate(5);
		return View::make('blog.index')->withPosts($posts)->withCategories($categories);
	}

	public function getByCat($category_id)
	{
		$posts = Post::where('category_id', $category_id)->orderBy('id','desc')->paginate(5);
		$categories = Category::all();
		return View::make('blog.index')->withPosts($posts)->withCategories($categories);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$categories = Category::all();
		return View::make('blog.show')->withPost($post)->withCategories($categories);
	}


}
