<?php

class GalleryCategoryController extends \BaseController {

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
	
		$usedcategories = DB::table('gallery_categories')->join('gallery', 'gallery_categories.id', '=', 'gallery.category_id')->select(array('gallery_categories.id', 'gallery_categories.category'))->distinct()->paginate(10);
		$unusedcategories = DB::table('gallery_categories')->leftjoin('gallery', 'gallery_categories.id', '=', 'gallery.category_id')->whereNull('gallery.category_id')->select(array('gallery_categories.id', 'gallery_categories.category'))->paginate(10);
		return View::make('admin.gallery-categories.index')->with('usedcategories', $usedcategories)->with('unusedcategories', $unusedcategories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.gallery-categories.create');
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
		$category = new Gallery_Category();
		$category->category = $category_name;
		$category->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.gallery-categories.index')->withMessage('Category was created!');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Gallery_Category::findOrFail($id);
		return View::make('admin.gallery-categories.edit')->withCategory($category);
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
		$category = Gallery_Category::findOrFail($id);
		$category->category = $category_name;
		$category->update();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.gallery-categories.index')->withMessage('Category was changed!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Gallery_Category::findOrFail($id)->delete();
		return Redirect::route('admin.gallery-categories.index')->withMessage('Category was deleted!');
	}


}
