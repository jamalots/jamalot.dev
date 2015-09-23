<?php

// use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
// use Eloquent;
// had to comment out 'use Eloquent' for db migration to run successfully

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = ['user_name','email','password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function events()
	{
		return $this->hasMany('Event');
	}

	public static function register($user_name, $email, $password)
	{
		return $user = new static(compact('user_name', 'email','password'));

	}

}
