<?php

use Jamalot\Forms\RegistrationForm;

class RegistrationController extends \BaseController {
	protected $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{

		$this->registrationForm = $registrationForm;

	}


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
		$this->registrationForm->validate(Input::all());

		$user = User::create(
			Input::only('user_name','email','password')

		);

		Auth::login($user);

		return Redirect::home();	
	}



}
