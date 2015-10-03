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

	public function statuses()
	{
		return $this->hasMany('Status')->latest();


	}

	public function images()
	{
		return $this->hasMany('Img');


	}

	public function ads()
	{
		return $this->hasMany('Ad');

	}

	public function is($user)
	{

		if(is_null($user)) return false;

		return $this->user_name == $user->user_name;

	}

	public function followedUsers()
	{

		return $this->belongsToMany(self::class,'follows', 'follower_id', 'followed_id')->withTimestamps();
	}
	public function followers()
	{
		return $this->belongsToMany(self::class,'follows', 'followed_id', 'follower_id')->withTimestamps();
	}


	public function isFollowedBy(User $otherUser)
	{
		$idsOfFollowers = $otherUser->followedUsers()->lists('followed_id');

		return in_array($this->id, $idsOfFollowers);

	}

	public function comments()
	{
		return $this->hasMany('Comment');

	}

	public function eventsCreated() 
	{
		return $this->hasMany('Event', 'user_id');
	}
	public function eventsAttending() 
	{
		return $this->belongsToMany('Event', 'event_user', 'user_id', 'event_id');
	}

	public function notifications()
	{
		return $this->hasMany('Notification', 'notified_id');

	}

	public function triggerdNotifications()
	{
		return $this->hasMany('Notification', 'notifier_id');

	}

	


	

}
