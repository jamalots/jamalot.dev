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
		$directory = '/img/uploads/';
        $ad = new Ad;
        $ad->ad_type = Input::get('ad_type');
        $ad->ad_need = Input::get('ad_need');
        $ad->ad_title = Input::get('password');
        $ad->level = Input::get('level');
        if (Input::has('comp')){
        	$ad->comp = Input::get('comp');
    	}
        $ad->genre = Input::get('genre');
        if (Input::has('date')){
        	$ad->date = Input::get('date');
    	}
        if (Input::has('start_time')){
        	$ad->start_time = Input::get('start_time');
        }
        if (Input::has('end_time')){
        	$ad->end_time = Input::get('end_time');
        }
        if (Input::has('description')){
        	$ad->description = Input::get('description');
        }
        if (Input::has('equipment')){
        	$ad->equipment = Input::get('equipment');
        }
        $ad->venue_type = Input::get('venue_type');
        $ad->venue = Input::get('venue');
        $ad->address = Input::get('address');
        $ad->city = Input::get('city');
        $ad->state = Input::get('state');
        $ad->zip_code = Input::get('zip_code');
        $ad->user_id = Auth::id();
        if (Input::hasFile('ad_img')) {
        	$file = Input::file('ad_img');
 			$filename = Auth::id() . $file->getClientOriginalName();
            $file = $file->move(public_path() . $directory, $filename);
			$ad->ad_img = $directory . $filename; 
        } 
        
        if ($user->save()) {
            Session::flash('successMessage', 'You created an ad successfully');
            return Redirect::action('AdsController@show', Auth::id());
        } else {
            Session::flash('errorMessage', 'Could not save ad.');
            dd($user->getErrors()->toArray());
            return Redirect::action('UsersController@index')
                    ->withInput()->withErrors($ad->getErrors());
        }
	}
	
			
	/**
	 * Display the specified ad.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ad = Ad::find($id);

		$users = $ad->attendees;

		$requests = AdRequest::where('ad_id', $id)->whereNull('approved')->get();

		return View::make('ads.show', compact('ad', 'users', 'requests'));


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

		Flash::message( $user->user_name . 'is denied from attending this event');

		return Redirect::route('ads.index');
	}

	public function getRequests($id)
	{
		$query = Request::with('ad')->where('ad_id', $id);

        $requests = $query->get();

		// return View::make('users.photos')->with(array('requests' => $requests));
	}

	public function registerUser($userid, $adid)
	{
		$user = User::find($userid);
		$user->adsAttending()->attach($adid);
			

		Flash::message( $user->user_name . 'is now registered for this event');
		return Redirect::action('AdsController@show', $adid);
	}

}
