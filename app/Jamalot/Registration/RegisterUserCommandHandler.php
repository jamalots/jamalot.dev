<?php 

namespace Jamalot\Registration;

use Laracasts\Commander\CommandHandler;
use Jamalot\Users\UserRepository;
//check above
use User;



class RegisterUserCommandHandler implements CommandHandler {

	protected $repository;

	function __construct(UserRepository $repository) 
	{
		$this->repository = $repository;

	}



	public function handle($command)
	{
		$user = User::register($command->user_name, $command->email, $command->password);

		$this->repository->save($user);


		return $user;



	}


}