<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('id','desc')->paginate(10);
		return View::make('admin.users.index')->withUsers($users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
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
				'username' => array ('required', 'unique:users,username'),
			);

		// use laravel validator class to check if rules are met
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			// redirect and pass errors and input back to view
			return Redirect::route('admin.users.create')->withErrors($validator)->withInput();
		}

		// save data in database
		$username = Input::get('username');
		$password = Input::get('password');
		$user = new User();
		$user->username = $username;
		$user->password = $password;
		$user->save();
		// adds message to laravel $ession object to be retrieved anywhere on the site
		return Redirect::route('admin.users.index')->withMessage('User was created!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id)->delete();
		return Redirect::route('admin.users.index')->withMessage('User was deleted!');
	}


}
