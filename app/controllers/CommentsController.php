<?php

use Laracasts\Commander\CommanderTrait;
use Jamalot\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {

	use CommanderTrait;
	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'user_id', Auth::id());

		$comment = $this->execute(LeaveCommentOnStatusCommand::class, $input);

		$status = $comment->status;

		// if(!$comment->user_id = Auth::id()) {
			$notification = new Notification;

			$notification->notification_type = 'commented';
			$notification->notified_id = $comment->status->user_id;
			$notification->notifier_id = Auth::id();

			$comment->notification()->save($notification);

		// }

		// Flash::message('Your comment has been successfully added.');
		

		// return Redirect::back();

		return View::make('statuses.partials.comment')->with(['status' => $status, 'comment' => $comment]);
	}

	public function destroy($id)
	{
		$status = Comment::find($id);
		$status->delete();

		Flash::message('Your comment has been deleted.');

		return Redirect::back();
	}


}