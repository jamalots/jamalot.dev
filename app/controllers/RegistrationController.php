<?php

use Jamalot\Forms\RegistrationForm;
use Jamalot\Registration\RegisterUserCommand;
use Jamalot\Core\CommandBus;

class RegistrationController extends BaseController {

	use CommandBus;

	private $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{

		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');

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

		extract(Input::only('user_name','email','password'));


		$user = $this->execute(
			new RegisterUserCommand($user_name,$email,$password)
		);

		Auth::login($user);

		Flash::overlay('Welcome to Jamalot! Where We Jam Lots!');

		return Redirect::home();	
	}



}
