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
		$category = new Category();
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
				'category' => array ('required') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.posts.create')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category_id = Input::get('category');
		$new_category = Input::get('new_category');
		if (!empty($new_category)) {
			$category = new Category();
			$category->category = $new_category;
			$category->save();
			$category_id = $category->id;
		}
		$content = Input::get('content');
		$post = new Post();
		$post->title = $title;
		$post->category_id = $category_id;
		$post->content = $content;
		$post->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.posts.index')->withMessage('Post was created!');
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
		$category = Post::find($id)->category;
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
				'category' => array ('required') 
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.posts.edit')->withErrors($validator)->withInput();
		}

		// save data in database
		$title = Input::get('title');
		$category_id = Input::get('category');
		$new_category = Input::get('new_category');
		if (!empty($new_category)) {
			$category = new Category();
			$category->category = $new_category;
			$category->save();
			$category_id = $category->id;
		}
		$content = Input::get('content');
		$post = Post::findOrFail($id);
		$post->title = $title;
		$post->category_id = $category_id;
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
		$post = Post::findOrFail($id)->delete();
		// Find a way to automatically delete all comments asocciated with a post
		$comments = Comment::where('post_id', '=', $id)->delete();
		return Redirect::route('admin.posts.index')->withMessage('Post was deleted!');
	}


}
