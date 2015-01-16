<?php

class HomeController extends BaseController {


	public function index()
	{
		$post = Post::orderBy('created_at','desc')->first();
		$galleryitem = Gallery_Item::orderBy('date','desc')->first();
		return View::make('index')->withPost($post)->with('galleryitem', $galleryitem);
	}

}
