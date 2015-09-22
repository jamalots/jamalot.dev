<?php

class RegistrationController extends \BaseController {

	/**
	 * Show a form to register the user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');	
	}

	public function store()
	{
		$user = User::create(
			Input::only('user_name','email','password')

		);

		Auth::login($user);

		return Redirect::home();	
	}



}
