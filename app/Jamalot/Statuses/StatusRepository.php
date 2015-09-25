<?php

namespace Jamalot\Statuses;

use Status;
use User;

class StatusRepository {

	public function getAllForUser(User $user)
	{

		return $user->statuses()->with('user')->latest()->get();

	}

	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);


	}

	public function getFeedForUser(User $user)
	{
		$userIds = $user->follows()->lists('followed_id');

		$userIds[] = $user->id;

		return Status::whereIn('user_id', $userIds)->latest()->get();

	}

}