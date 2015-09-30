<?php

class AdsController extends \BaseController {

	/**
	 * Display a listing of ads
	 *
	 * @return Response
	 */
	public function index()
	{
		$ads = Ad::all();

		return View::make('ads.index', compact('ads'));
	}

	/**
	 * Show the form for creating a new ad
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ads.create');
	}

	/**
	 * Store a newly created ad in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ad::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Ad::create($data);

		return Redirect::route('ads.index');
	}

	/**
	 * Display the specified ad.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ad = Ad::findOrFail($id);

		return View::make('ads.show', compact('ad'));
	}

	/**
	 * Show the form for editing the specified ad.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ad = Ad::find($id);

		return View::make('ads.edit', compact('ad'));
	}

	/**
	 * Update the specified ad in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ad = Ad::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ad::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ad->update($data);

		return Redirect::route('ads.index');
	}

	/**
	 * Remove the specified ad from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ad::destroy($id);

		return Redirect::route('ads.index');
	}

}
