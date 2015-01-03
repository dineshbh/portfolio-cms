<?php

class BlogController extends \BaseController {

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

	public function show($id) 
	{
		$comments = Comment::all();
		$posts = Post::where('id', $id)->get();
		$categories = Category::all();
		return View::make('blog.single')->withPosts($posts)->withCategories($categories)->withComments($comments);
	}


}
