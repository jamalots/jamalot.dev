<?php

// use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Support\Facades\Hash;
use Jamalot\Registration\Events\UserRegistered;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,EventGenerator;

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
		$user = new static(compact('user_name', 'email','password'));

		$user->raise(new UserRegistered($user));

		return $user;

	}

	public function setPasswordAttribute($password)
	{

		$this->attributes['password'] = Hash::make($password);

	}

}
