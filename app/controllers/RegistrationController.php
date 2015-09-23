<?php

use Jamalot\Forms\RegistrationForm;
use Jamalot\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {

	private $commandBus;

	private $registrationForm;

	function __construct(CommandBus $commandBus, RegistrationForm $registrationForm)
	{

		$this->registrationForm = $registrationForm;
		$this->commandBus = $commandBus;

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


		$user = $this->commandBus->execute(
			new RegisterUserCommand($user_name,$email,$password)
		);


		Auth::login($user);

		return Redirect::home();	
	}



}
