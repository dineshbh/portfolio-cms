<?php

class PostsController extends \BaseController {

public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('id','desc')->paginate(10);
		return View::make('admin.posts.index')->withPosts($posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('category', 'id');
		$category = array();
		return View::make('admin.posts.create')->withCategory($category)->withCategories($categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create rules list
		$rules = array (
				'title' => array ('required', 'unique:posts,title'),
				'category' => array ('required', 'exists:categories,id') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.posts.create')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category = Input::get('category');
		$content = Input::get('content');
		$post = new Post();
		$post->title = $title;
		$post->category_id = $category;
		$post->content = $content;
		$post->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.posts.index')->withMessage('Post was created!');
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
		return View::make('admin.posts.show')->withPost($post)->withCategories($categories);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$categories = Category::lists('category', 'id');
		$category = $post->category_id;
		return View::make('admin.posts.edit')->withPost($post)->withCategory($category)->withCategories($categories);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		// create rules list
		$rules = array (
				'title' => array ('required', 'unique:posts,title,'.$id),
				'category' => array ('required', 'exists:categories,id') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.posts.edit')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category = Input::get('category');
		$content = Input::get('content');
		$post = Post::findOrFail($id);
		$post->title = $title;
		$post->category_id = $category;
		$post->content = $content;
		$post->update();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.posts.index')->withMessage('Post was updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = POst::findOrFail($id)->delete();
		return Redirect::route('admin.posts.index')->withMessage('Post was deleted!');
	}


}
