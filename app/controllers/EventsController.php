<?php
use Faker\Factory as Faker;
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
			$faker = Faker::create();

		 	$directory = '/img/uploads/';
    //         $image = Input::file('img');
            $event = new Event;
            
            $event->event_title = Input::get('event_title');
            $event->description = Input::get('description');
            $event->date = Input::get('date');
            $event->start_time = Input::get('start_time');
            $event->venue = Input::get('venue');
            if (Input::has('venue_site')){
            	$event->venue_site = Input::get('venue_site');
            }
            if (Input::has('price')){
            	$event->price = Input::get('price');
            } else {
            	$event->price = 0;
            }
            $event->zip_code = Input::get('zip_code');
            $event->city = Input::get('city');
            $event->address = Input::get('address');
            $event->state = Input::get('state');
            if (Input::hasFile('img')) {
	        	$file = Input::file('img');
	 			$filename = Auth::id() . $file->getClientOriginalName();
	            $file = $file->move(public_path() . $directory, $filename);
				$event->img = $directory . $filename; 
	        }
	        $event->img = $faker->imageUrl($width = 640, $height = 480, $category = 'nightlife');
	        if (Input::hasFile('cover_img')) {
	        	$file = Input::file('cover_img');
	 			$filename = Auth::id() . $file->getClientOriginalName();
	            $file = $file->move(public_path() . $directory, $filename);
				$event->cover_img = $directory . $filename; 
	        }
	        $event->cover_img = $faker->imageUrl($width = 1103, $height = 363);
	        $event->user_id = Auth::id();
            $event->save();
            Log::info("Event successfully saved.", Input::all());
            Session::flash('successMessage', 'You created ' . $event->title . ' successfully');
            return Redirect::action('events.show', $event->id);
	}

	

	/**
	 * Display the specified event.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $event = Event::find($id);
        if(!$event) {
            Session::flash('errorMessage', "Post with id of $id is not found");
            App::abort(404);
        }
        
        
        $venues = Event::where('venue', $event->venue)->orderBy('date', 'desc')->get();
        return View::make('events.show')->with(array('event' => $event))->with(array('venues' => $venues));
        
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
    public function showRegistration($id)
	{
		$event = Event::find($id);
		$users = $event->attendees;
		return View::make('events.registration', compact('users','event'));

	}

	public function registerUser($id)
	{
		$user = Auth::user();
		$user->eventsAttending()->attach($id);
		Flash::message('You a now registered for this event');
		return Redirect::action('EventsController@show', $id);
	}

	public function showDeleteConfirmation($id) 
	{

		return View::make('events.deleteConfirmation')->with('id', $id);

	}

	public function unregisterUser($id) 
	{
		$user = Auth::user();
		$user->eventsAttending()->detach($id);

		Flash::message('You are now longer attending this event.');


		return Redirect::action('EventsController@show', $id);

	}

}
