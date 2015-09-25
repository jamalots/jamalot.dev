<?php 

namespace Jamalot\Users;

use Laracasts\Commander\CommandHandler;
use Jamalot\Users\UserRepository;


class UnfollowUserCommandHandler implements CommandHandler {


	protected $userRepo;

	function __construct(UserRepository $userRepo)
	{

		$this->userRepo= $userRepo;

	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$user = $this->userRepo->findById($command->userId);

    	$this->userRepo->unfollow($command->userIdToUnfollow, $user);

    	return $user;
    }

}