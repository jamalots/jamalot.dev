<?php

namespace Jamalot\Statuses\Events;

use Status;

class StatusWasPublished {

	public $body;

	function __construct($body)
	{

		$this->body = $body;
	}
}