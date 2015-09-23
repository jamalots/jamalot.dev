<?php 

namespace Jamalot\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;


class PublishStatusCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $statusRepository;

	function __construct(StatusRepository $statusRepository)
	{

		$this->statusRepository = $statusRepository;


	}


	public function handle($command)
	{
		
		$status = Status::publish($command->body);

		$status = $this->statusRepository->save($status, $command->userId);

		$this->dispatchEventsFor($status);

		return $status;

	}


}