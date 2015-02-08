<?php

class BlogController extends \BaseController {

	public function index()
	{	
		$posts = Post::orderBy('created_at','desc')->paginate(5);
		$categories = Category::has('post')->get();
		foreach($posts as $post)
		{
			$commentcount[$post->id] = Comment::where('post_id', $post->id)->count();
		}
		return View::make('blog.index')->withPosts($posts)->withCategories($categories)->with('commentcount', $commentcount);
	}

	public function getByCat($category_id)
	{
		$posts = Post::where('category_id', $category_id)->orderBy('id','desc')->paginate(5);
		$categories = Category::has('post')->get();
		$currentcategory = Category::where('id', $category_id)->get();
		foreach($posts as $post)
		{
			$commentcount[$post->id] = Comment::where('post_id', $post->id)->count();
		}
		return View::make('blog.index')->withPosts($posts)->withCategories($categories)->with('commentcount', $commentcount)->with('currentcategory', $currentcategory);
	}

	public function show($id) 
	{
		$comments = Comment::where('post_id', $id)->where('approved', 1)->orderBy('created_at', 'desc')->get();
		$posts = Post::where('id', $id)->get();
		$categories = Category::has('post')->get();
		return View::make('blog.single')->withPosts($posts)->withCategories($categories)->withComments($comments);
	}

	public function store() 
	{
		
		// create rules list
		$rules = array (
				'commenter' => array ('required'),
				'email' => array ('required'),
				'comment'=> array ('required')
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// save data in database
		$commenter = Input::get('commenter');
		$email = Input::get('email');
		$comment_text = Input::get('comment');
		$post_id = Input::get('post_id');
		$comment = new Comment();
		$comment->commenter = $commenter;
		$comment->email = $email;
		$comment->comment = $comment_text;
		$comment->post_id = $post_id;
		$comment->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::back()->withMessage('Comment was submitted!');
	}
}
