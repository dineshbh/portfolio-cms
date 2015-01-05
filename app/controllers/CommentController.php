<?php

class CommentController extends \BaseController {

public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
}

	public function index()
	{
		$posts = Post::all();
		$commentsapp = Comment::orderBy('created_at','desc')->where('approved', '=', '1')->paginate(10);
		$commentsunapp = Comment::orderBy('created_at','desc')->where('approved', '=', '0')->paginate(10);
		return View::make('admin.comments.index')->withPosts($posts)->withCommentsapp($commentsapp)->withCommentsunapp($commentsunapp);
	}

	public function getByPost($id)
	{
		$getByPost = 1;
		$posts = Post::where('id', $id)->get();
		$commentsapp = Comment::orderBy('created_at','desc')->where('approved', '=', '1')->where('post_id', '=', $id)->paginate(10);
		$commentsunapp = Comment::orderBy('created_at','desc')->where('approved', '=', '0')->where('post_id', '=', $id)->paginate(10);
		return View::make('admin.comments.index')->withPosts($posts)->withCommentsapp($commentsapp)->withCommentsunapp($commentsunapp)->with('getByPost', $getByPost);
	}

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
