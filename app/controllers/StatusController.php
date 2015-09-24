<?php

use Jamalot\Statuses\StatusRepository;
use Jamalot\Statuses\PublishStatusCommand;
use Jamalot\Core\CommandBus;

class StatusController extends \BaseController {

	use CommandBus;

	protected $statusRepository;

	function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getAllForUser(Auth::user());

		return View::make('statuses.index',compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$this->execute( 

			new PublishStatusCommand(Input::get('body'), Auth::user()->id)

		);

		Flash::message('Your Is Status Updated!!');

		return Redirect::refresh();

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
