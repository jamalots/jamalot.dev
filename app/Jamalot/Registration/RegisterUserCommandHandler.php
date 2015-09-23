<?php 

namespace Jamalot\Registration;

use Laracasts\Commander\CommandHandler;
use Jamalot\Users\UserRepository;
//check above
use User;
use Laracasts\Commander\Events\DispatchableTrait;



class RegisterUserCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $repository;

	function __construct(UserRepository $repository) 
	{
		$this->repository = $repository;

	}



	public function handle($command)
	{
		$user = User::register($command->user_name, $command->email, $command->password);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;



	}


}