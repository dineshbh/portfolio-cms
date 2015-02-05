<?php

class ProjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleryitems = Gallery_Item::orderBy('date','desc')->get();
		$categories = Gallery_Category::all();
		return View::make('projects.index')->with('galleryitems', $galleryitems)->withCategories($categories);
	}

	public function getByCat($category_id)
	{
		$galleryitems = Gallery_Item::where('category_id', $category_id)->orderBy('date','desc')->get();
		$categories = Gallery_Category::all();
		$selectedCategory = Gallery_Category::findOrFail($category_id);
		return View::make('projects.index')->with('galleryitems', $galleryitems)->withCategories($categories)->with('selectedCategory', $selectedCategory);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$galleryitems = Gallery_Item::where('id', $id)->get();
		$categories = Gallery_Category::all();
		return View::make('projects.single')->with('galleryitems', $galleryitems)->withCategories($categories);
	}

}
