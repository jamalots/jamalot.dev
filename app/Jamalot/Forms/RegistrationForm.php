<?php

namespace Jamalot\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	protected $rules = [
		'user_name' => 'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed'

	];


}