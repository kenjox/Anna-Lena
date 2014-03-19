<?php

class UsersController extends BaseController {

	
	public function getLogin()
	{
		return View::make('users.login');
	}

	public function postLogin()
	{
		$user = array(

			'email' => Input::get('email'),
			'password' => Input::get('password'),
			
		);

		if( Auth::attempt( $user ) )
		{
			return Redirect::route('admin.dashboard');
				
		}
		else 
		{ 
			return Redirect::route('users.login')->withInput()
			                               ->with('loginErrors','Invalid username or password'); 
		}
			
	
	}

	public function Logout()
	{
		if( Auth::check() ) 
		{
			Auth::logout();
			return Redirect::route('users.login');

		}
		return Redirect::route('users.login');
	}

}
