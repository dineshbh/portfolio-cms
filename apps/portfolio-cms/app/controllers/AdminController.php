<?php

class AdminController extends \BaseController {

public function __construct()
    {
        //updated: prevents re-login.
        $this->beforeFilter('guest',['only' => ['getLogin']]);
        $this->beforeFilter('auth',['only' => ['getLogout']]);
    }


public function index() {
    
    $posts = Post::orderBy('id','desc')->paginate(10);
    return View::make('admin.posts.index')->withPosts($posts);
}

public function getLogin() 
    {
        return View::make('admin/login');
    }
 
    public function postLogin()
    {
        $credentials = [
            'username'=>Input::get('username'),
            'password'=>Input::get('password')
        ];
        $rules = [
            'username' => 'required',
            'password'=>'required'
        ];
        $validator = Validator::make($credentials,$rules);
        if($validator->passes())
        {
            if(Auth::attempt($credentials))
            {
                return Redirect::to('admin')->withMessage('Login Successful!');
                } else {
                    return Redirect::back()->withInput()->with('message','username or password is invalid!');
                }
            }
        else
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }
 
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('admin/login')->withMessage('You have logged out');
    }
 
}
