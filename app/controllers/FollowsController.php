<?php

use Jamalot\Users\FollowUserCommand;
use Jamalot\Users\UnFollowUserCommand;
use Jamalot\Users\UsersRepository;

class FollowsController extends \BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();

		$input['userId'] = Auth::id();

		$followed = $this->execute(FollowUserCommand::class, $input);

		$notification = new Notification;

		$notification->notification_type = 'following';
		$notification->notified_id = Input::get('userIdToFollow');
		$notification->notifier_id = Auth::id();

		$notification->save();

		Flash::success("You are now following this user.");

		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
		$input = Input::get();

		$input['userId'] = Auth::id();

		$this->execute(UnfollowUserCommand::class, $input);

		Flash::success('You have now unfollowed this user.');

		Return Redirect::back();
	}

	public function showFollowers($id)
	{
		$user = User::find($id);


		return View::make('users.followers',compact('user'));
	
		
	}

	public function showFollowedUsers($id)
	{
		$user = User::find($id);


		return View::make('users.followedUsers',compact('user'));

	}


}
