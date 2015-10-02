<?php

use Jamalot\Forms\SignInForm;


class SessionsController extends \BaseController {

	private $signInForm;

	function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;
		$this->beforeFilter('guest',['except' => 'destroy']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email','password');

		$this->signInForm->validate($formData);

		if(!Auth::attempt($formData)) 
		{
			Flash::message('We could not sign you in, please try again.');

			return Redirect::back()->withInput();

		}
			Flash::message('You are now signed in. Welcome Back!');
			return Redirect::intended('statuses');
	}

	public function destroy()
	{

		Auth::logout();

		Flash::message('You Are Now Logged Out.');

		return Redirect::home();
	}



}
