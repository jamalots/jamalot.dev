<?php

use Laracasts\Commander\Events\EventGenerator;
use Jamalot\Statuses\Events\StatusWasPublished;

class Status extends \Eloquent {

	use EventGenerator;

	protected $fillable = ['body'];

	public function user()
	{
		return $this->belongsTo('User');


	}

	public static function publish($body) {

		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;

	}

	public function comments()
	{

		return $this->hasMany('Comment');
	}

}