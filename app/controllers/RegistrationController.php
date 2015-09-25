<?php

use Jamalot\Forms\RegistrationForm;
use Jamalot\Registration\RegisterUserCommand;


class RegistrationController extends BaseController {

	// use CommanderTrait;

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

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Welcome to Jamalot! Where We Jam Lots!');

		return Redirect::home();	
	}



}
