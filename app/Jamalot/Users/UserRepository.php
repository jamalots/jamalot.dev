<?php

namespace Jamalot\Users;

use User;

class UserRepository {

	public function save(User $user)
	{

		return $user->save();


	}

}