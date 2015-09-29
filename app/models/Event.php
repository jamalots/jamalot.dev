<?php

// use \Esensi\Model\Model;
class Event extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'events';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function attendees()
	{
		return $this->belongsToMany('User', 'event_user', 'event_id', 'user_id');
	}

	public function creator()
	{
		return $this->belongsTo('User', 'user_id');
	}
}