<?php

class ImgsController extends \BaseController {

	/**
	 * Display a listing of imgs
	 *
	 * @return Response
	 */
	public function index()
	{
		$imgs = Img::all();

		return View::make('imgs.index', compact('imgs'));
	}

	/**
	 * Show the form for creating a new img
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('imgs.create');
	}

	/**
	 * Store a newly created img in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Img::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Img::create($data);

		return Redirect::route('imgs.index');
	}

	/**
	 * Display the specified img.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$img = Img::findOrFail($id);

		return View::make('imgs.show', compact('img'));
	}

	/**
	 * Show the form for editing the specified img.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$img = Img::find($id);

		return View::make('imgs.edit', compact('img'));
	}

	/**
	 * Update the specified img in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$img = Img::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Img::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$img->update($data);

		return Redirect::route('imgs.index');
	}

	/**
	 * Remove the specified img from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Img::destroy($id);

		return Redirect::route('imgs.index');
	}

}
