<?php


// use \Esensi\Model\Model;
class AdRequest extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $table = 'requests';

	public function ad()
	{
		return $this->belongsTo('Ad');
	}

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

}