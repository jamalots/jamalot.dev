<?php

namespace Jamalot\Statuses;

use Status;
use User;
use Comment;

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
		$userIds = $user->followedUsers()->lists('followed_id');

		$userIds[] = $user->id;

		
		return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();



	}

	public function leaveComment($userId, $statusId, $body)
	{

		$comment = Comment::leave($body, $statusId);

		User::findOrFail($userId)->comments()->save($comment);

		return $comment;

	}

}