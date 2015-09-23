<?php 

namespace Jamalot\Registration;

class RegisterUserCommand {

	public $user_name;

	public $email;

	public $password;

	function __construct($user_name,$email,$password)
	{
		$this->user_name = $user_name;
		$this->email = $email;
		$this->password = $password;


	}

}