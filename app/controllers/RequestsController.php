<?php

class RequestsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /ads
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ads
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = Input::get('ad_id');
		$request = new AdRequest;
		$request->ad_id = $id;
		$request->user_id = Auth::id();
		if ($request->save()) {
            Session::flash('successMessage', 'Your request has been sent. If the owner approves you, you will
            	be registered for the event and a notification will be sent.');
            return Redirect::action('AdsController@show', $id);
        } else {
            Session::flash('errorMessage', 'Could not save ad.');
            dd($request->getErrors()->toArray());
            return Redirect::action('AdsController@show', $id)
                    ->withInput()->withErrors($ad->getErrors());
        }
	}

	/**
	 * Display the specified resource.
	 * GET /ads/{id}
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
	 * GET /ads/{id}/edit
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
	 * PUT /ads/{id}
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
	 * DELETE /ads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$adid = Input::get('ad_id');

		$request = AdRequest::find($id);

		$request->delete();

		Session::flash('successMessage', 'Denied');
		
        return Redirect::action('AdsController@show', $adid);
	}

}