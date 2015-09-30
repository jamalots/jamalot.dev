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

		$this->execute(LeaveCommentOnStatusCommand::class, $input);

		return Redirect::back();
	}

	public function destroy($id)
	{
		$status = Comment::find($id);
		$status->delete();

		Flash::message('Your comment has been deleted.');

		return Redirect::back();
	}


}