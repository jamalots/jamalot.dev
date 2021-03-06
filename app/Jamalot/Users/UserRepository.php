<?php

namespace Jamalot\Users;

use User;

class UserRepository {

	public function save(User $user)
	{

		return $user->save();


	}

	public function getPaginated($howMany=25)
	{

		return User::paginate($howMany);

	}

	public function findByUsername($user_name)
	{

		return User::with('statuses')->whereUser_name($user_name)->first();
	}

	public function findById($id)
	{

		return User::findOrFail($id);

	}

	public function follow($userIdToFollow, User $user)
	{
		return $user->followedUsers()->attach($userIdToFollow);

	}

	public function unfollow($userIdToUnfollow, User $user)
	{
		return $user->followedUsers()->detach($userIdToUnfollow);

	}

}