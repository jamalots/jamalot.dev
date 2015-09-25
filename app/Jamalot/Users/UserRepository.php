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

		return User::with(['statuses' => function($query)
		{
				$query->latest();

		}])->whereUser_name($user_name)->first();
	}

}