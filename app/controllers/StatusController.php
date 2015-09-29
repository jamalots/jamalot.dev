<?php

use Jamalot\Statuses\StatusRepository;
use Jamalot\Statuses\PublishStatusCommand;
use Jamalot\Forms\PublishStatusForm;

class StatusController extends \BaseController {

	protected $statusRepository;

	protected $publishStatusForm;

	function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
	{
		$this->beforeFilter('auth');

		$this->statusRepository = $statusRepository;
		$this->publishStatusForm = $publishStatusForm;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$statuses = $this->statusRepository->getFeedForUser(Auth::user());

		return View::make('statuses.index',compact('statuses'));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::get();

		$input['userId'] = Auth::id();

		$this->publishStatusForm->validate($input);



		$this->execute(PublishStatusCommand::class, $input);

		Flash::message('Your Is Status Updated!!');

		return Redirect::back();

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$status = Status::find($id);
		$status->delete();

		return Redirect::back();
	}


}
