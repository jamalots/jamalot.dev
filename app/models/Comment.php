<?php


class Comment extends \Eloquent {

	protected $fillable = ['user_id', 'status_id','body'];


	public function owner()
	{

		return $this->belongsTo('User','user_id');
	}

	public static function leave($body,$statusId)
	{

		return new static ([

			'body' => $body,
			'status_id' => $statusId

		]);


	}

	public function notification()
	{
		return $this->morphOne('Notification', 'trigger');

	}

	public function status()
	{
		return $this->belongsTo('Status');
	}

}