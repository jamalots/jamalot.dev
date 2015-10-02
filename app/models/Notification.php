<?php

class Notification extends \Eloquent {

	protected $fillable = [];

	public function trigger()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo('User', 'notified_id');
	}

	public function sourceUser()
	{
		return $this->belongsTo('User', 'notifier_id');
	}
}