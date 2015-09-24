<?php

namespace Jamalot\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

	protected $rules = [
		'body' => 'required',

	];


}