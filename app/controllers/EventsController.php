<?php

class EventsController extends \BaseController {

	/**
	 * Display a listing of events
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Event::with('user');

		$events = $query->orderBy('date')->get();

		return View::make('events.index')->with(array('events' => $events));
	}


	/**
	 * Show the form for creating a new event
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create');
	}

	/**
	 * Store a newly created event in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $validator = Validator::make($data = Input::all(), Event::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// Event::create($data);

		// return Redirect::route('events.index');

		 	// $directory = 'img/uploads/';
    //         $image = Input::file('img');
            $event = new Event;
            
            $event->date = Input::get('date');
            $event->start_time = Input::get('start_time');
            $event->venue = Input::get('venue');
            $event->venue_site = Input::get('venue_site');
            $event->zip_code = Input::get('zip_code');
            $event->city = Input::get('city');
            $event->user_id = 1;
            
            // if (Input::hasFile('img')) {
            //     $event->img = $image->move($directory);
            // }
            $event->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $event->title . ' event successfully');
            return Redirect::action('hello');
	}

	

	/**
	 * Display the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = Event::findOrFail($id);

		return View::make('events.show', compact('event'));
	}

	/**
	 * Show the form for editing the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = Event::find($id);

		return View::make('events.edit', compact('event'));
	}

	/**
	 * Update the specified event in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$event = Event::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Event::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$event->update($data);

		return Redirect::route('events.index');
	}

	/**
	 * Remove the specified event from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Event::destroy($id);

		return Redirect::route('events.index');
	}

}
