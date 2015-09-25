<?php
//integrate into main UsersController
use Jamalot\Users\UserRepository;

class UsersController2 extends \BaseController {

	
	protected $userRepository;


	function __construct(UserRepository $userRepository)
	{

		$this->userRepository = $userRepository;


	}


	// public function index()
	// {
	// 	$users = $this->userRepository;

	// 	return View::make(users.index)->withUsers($users);
	// }

	public function show($user_name)
	{
		$user = $this->userRepository->findByUsername($user_name);

		return View::make('users.profile')->withUser($user);

	}



}
