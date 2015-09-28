<?php

namespace Jamalot\Mailers;

use User;

class UserMailer extends Mailer {


	public function sendMessageTo(User $user) 
	{

		$subject = 'Welcome To Jamalot';

		$view = 'emails.registration.comfirm';


		return $this->sendTo($user, $subject, $view);

	}
}