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
            $event->price = Input::get('price');
            $event->zip_code = Input::get('zip_code');
            $event->city = Input::get('city');
            $event->address = Input::get('address');
            $event->state = Input::get('state');
            $event->description = Input::get('description');
            $image = Input::file('img');
            $image = Input::file('cover_img');
            $event->user_id = Auth::id();
            
            if (Input::hasFile('img')) {
                $event->img = $image->move($directory);
            }
            $event->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $event->title . ' event successfully');
            return Redirect::action('events.manage');
	}

	

	/**
	 * Display the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $event = Event::findOrFail($id);

		// return View::make('events.show', compact('event'));


        $event = Event::find($id);
        if(!$event) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
        Log::info("Event of id $id found");
        if (Request::wantsJson()) {
            return Response::json($event);
        } 
        return View::make('events.show')->with(array('event' => $event));
        
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
		$event = Event::find($id);
            $directory = 'img/uploads/';
            $image = Input::file('img');
    
            $event->venue = Input::get('venue');
            $event->venue_site = Input::get('venue_site');
            $event->description = Input::get('description');
            $event->date = Input::get('date');
            $event->price = Input::get('price');
            $event->start_time = Input::get('start_time');
            $event->address = Input::get('address');
            $event->city = Input::get('city');
            $event->state = Input::get('state');
            $event->zip_code = Input::get('zip_code');
            $event->user_id = Auth::id();
            if (Input::hasFile('img')) {
                $event->img = $image->move($directory);
            }
            if (Input::hasFile('cover_img')) {
                $event->img = $image->move($directory);
            }
            $event->save();
            Session::flash('successMessage', 'You updated ' . $event->title . ' event successfully');
            return Redirect::action('EventsController@getManage');
	}

	/**
	 * Remove the specified event from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$event = Event::find($id);

		$event->delete(); 

		return Redirect::action('EventsController@getManage'); 
		// $event = Event::find($id);
  //       if(!$event) {
  //           Session::flash('errorMessage', "Event with id of $id is not found");
  //           App::abort(404);
  //       }
  //       $event->delete();
  //       return Redirect::action('events.manage');
	}

	public function getManage()
    {
        $query = Event::with('user')->where('user_id', Auth::id());
        
        $events = $query->get();
        
		return View::make('events.manage')->with(array('events' => $events)); 
	   }

    public function getList()
    {
        $query = Event::with('user');
        $events = $query->get();
        return Response::json($events);
    }

    public function getEvent($id)
    {
        $event = Event::find($id);
        return Response::json($event);
    }

}
