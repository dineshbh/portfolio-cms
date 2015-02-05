<?php

class PostCategoryController extends \BaseController {

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
	
		$usedcategories = Category::has('post')->paginate(10);
		$unusedcategories = DB::table('categories')->leftjoin('posts', 'categories.id', '=', 'posts.category_id')->whereNull('posts.category_id')->select(array('categories.id', 'categories.category'))->paginate(10);
		return View::make('admin.post-categories.index')->with('usedcategories', $usedcategories)->with('unusedcategories', $unusedcategories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.post-categories.create');
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
				'category' => array ('required'),
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// save data in database
		$category_name = Input::get('category');
		$category = new Category();
		$category->category = $category_name;
		$category->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.post-categories.index')->withMessage('Category was created!');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return View::make('admin.post-categories.edit')->withCategory($category);
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
				'category' => array ('required'),
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// save data in database
		$category_name = Input::get('category');
		$category = Category::findOrFail($id);
		$category->category = $category_name;
		$category->update();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.post-categories.index')->withMessage('Category was changed!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id)->delete();
		return Redirect::route('admin.post-categories.index')->withMessage('Category was deleted!');
	}


}
