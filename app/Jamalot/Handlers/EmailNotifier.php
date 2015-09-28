<?php

namespace Jamalot\Handlers;

use Jamalot\Mailers\UserMailer;
use Jamalot\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

	private $mailer;

	function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;


	}

	public function whenUserHasRegistered(UserRegistered $event)
	{
		$this->mailer->sendWelcomeMessageTo($event->user);

	}

}