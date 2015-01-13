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
		$galleryitems = Gallery_Item::where('category_id', $category_id)->orderBy('id','desc')->get();
		$categories = Gallery_Category::all();
		$selectedCategory = Gallery_Category::findOrFail($category_id);
		return View::make('projects.index')->with('galleryitems', $galleryitems)->withCategories($categories)->with('selectedCategory', $selectedCategory);
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
		$galleryitems = Gallery_Item::where('id', $id)->get();
		$categories = Gallery_Category::all();
		return View::make('projects.single')->with('galleryitems', $galleryitems)->withCategories($categories);
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
		//
	}


}
