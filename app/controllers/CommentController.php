<?php

class CommentController extends \BaseController {

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
		$posts = Post::all();
		$commentsapp = Comment::orderBy('created_at','desc')->where('approved', '=', '1')->paginate(10);
		$commentsunapp = Comment::orderBy('created_at','desc')->where('approved', '=', '0')->paginate(10);
		return View::make('admin.comments.index')->withPosts($posts)->withCommentsapp($commentsapp)->withCommentsunapp($commentsunapp);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id)->delete();
		return Redirect::back()->withMessage('Comment was deleted!');
	}

	public function approve($id)
	{
		$comment = Comment::findOrFail($id);
		if (Input::get('approved') == 1)
		{
			$approved = '0';
			$comment->approved = $approved;
			$comment->update();
			// adds message to laravel $ession object to be retrieved anywhere on the site
			return Redirect::back()->withMessage('Comment was unapproved!');
		}
		else {
			$approved = '1';
			$comment->approved = $approved;
			$comment->update();
			// adds message to laravel $ession object to be retrieved anywhere on the site
			return Redirect::back()->withMessage('Comment was approved!');
		}
	}

}
