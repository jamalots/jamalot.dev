<?php

namespace Jamalot\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	protected $rules = [
		'user_name' => 'required|unique:users',
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed',
		'location' => 'required',
		'instrument' => 'required',
		'fb_link' => 'required|unique:users',
		'level' => 'required|unique:users',
		'original' => 'required|unique:users',
		'industry-role' => 'required|unique:users'

	];


}