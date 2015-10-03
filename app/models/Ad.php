<?php

class Ad extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'ads';

	public function user()
	{
		return $this->belongsTo('User');


	}

	public function requests()
	{
		$this->hasMany('AdRequest');
	}

	public function attendees()
	{
		return $this->belongsToMany('User', 'ad_user', 'ad_id', 'user_id');
	}
}