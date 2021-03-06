<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = User::with('events');

		$users = $query->get();

		return View::make('users.index', compact('users'));
	}

	public function musicians()
	{
		$query = User::with('events')->where('user_type', 'musician');

		$users = $query->get();

		return View::make('users.musicians')->with(array('users' => $users));
	}

	public function bands()
	{
		$query = User::with('events')->where('user_type', 'band');

		$users = $query->get();
		
		return View::make('users.bands')->with(array('users' => $users));
	}
	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = Auth::user();

		return View::make('users.create')->with(array('user' => $user));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$directory = '/img/uploads/';
        $image = Input::file('img');
        $user = new User;
        $user->user_name = Input::get('user_name');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->password_confirmation = Input::get('password_confirmation');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->instrument = Input::get('instrument');
        $user->location = Input::get('location');
        $user->genre = Input::get('genre');
        $user->about = Input::get('about');
        $user->level = Input::get('level');
        $user->user_type = Input::get('user_type');
        if (Input::hasFile('img')) {
        	$file = Input::file('img');
 			$filename = $user->id . $file->getClientOriginalName();
            $file = $file->move(public_path() . $directory, $filename);
			$user->img = $directory . $filename; 
        } 
        if (Input::hasFile('cover_img')) {
        	$file = Input::file('cover_img');
 			$filename = $user->id . $file->getClientOriginalName();
            $file = $file->move(public_path() . $directory, $filename);
			$user->cover_img = $directory . $filename; 
        } 
        if ($user->save()) {
        	// dd($user);
        	Auth::login($user);
            Session::flash('successMessage', 'You created ' . $user->id . '\'s profile successfully');
            return Redirect::action('UsersController@show', $user->id);
        } else {
            Session::flash('errorMessage', 'Could not save user.');
            dd($user->getErrors()->toArray());
            return Redirect::action('UsersController@index')
                    ->withInput()->withErrors($user->getErrors());
        }
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		$query = Ad::with('user');
		$opps = $query->get(); 
		
		// open file a image resource
		
		// // dd($profile);
		// $profile_cover = Image::make(public_path() . $user->cover_img);

		// // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
		
		// $profile_cover->fit(1103, 363)->save(public_path() . $user->cover_img);
		// // $profile->save($user->img);


		
		return View::make('users.show')->with(array('user' => $user))->with(array('opps' => $opps));
	}



	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::user()){
		$user = User::find($id);
		// return 'test';

		return View::make('users.edit')->with(array('user' => $user));
		}else{
			
			return Redirect::action('PagesController@login');
		}
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
        $directory = '/img/uploads/';
        $image = Input::file('img');
    	
    	if(Input::has('first_name')) {
	        $user->first_name = Input::get('first_name');
        }
        if(Input::has('last_name')) {
	        $user->last_name = Input::get('last_name');
    	}
        if(Input::has('instrument')) {
	        $user->instrument = Input::get('instrument');
    	}
    	if(Input::has('location')) {
	        $user->location = Input::get('location');
        }
        if(Input::has('genre')) {
	        $user->genre = Input::get('genre');
    	}
    	if(Input::has('about')) {
	        $user->about = Input::get('about');
    	}
    	if(Input::has('level')) {
	        $user->level = Input::get('level');
    	}
    	if(Input::has('user_type')) {
	        $user->user_type = Input::get('user_type');
    	}
    	if(Input::has('teacher')) {
	        $user->teacher = Input::get('teacher');
    	}
        if (Input::hasFile('img')) {
        	$file = Input::file('img');
 			$filename = $user->id . $file->getClientOriginalName();
            $file = $file->move(public_path() . $directory, $filename);
			$imgPath = $directory . $filename;

			$profile = Image::make(public_path() . $imgPath);
			$profile->fit(320, 240)->save(public_path() . $imgPath);

			$user->img = $imgPath;
        } 
        if (Input::hasFile('cover_img')) {
        	$file = Input::file('cover_img');
 			$filename = $user->id . $file->getClientOriginalName();
            $file = $file->move(public_path() . $directory, $filename);
			$imgPath = $directory . $filename;

			$profile_cover = Image::make(public_path() . $user->cover_img);
			$profile_cover->fit(1103, 363)->save(public_path() . $imgPath);

			$user->img = $imgPath;

        }
        if ($user->save()) {
        	// dd($user);
            Flash::message('successMessage', 'You updated your profile successfully');
            return Redirect::action('UsersController@show', $id);
        } else {
            Session::flash('errorMessage', 'Could not save user.');
            dd($user->getErrors()->toArray());
            return Redirect::action('PagesController@home')
                    ->withInput()->withErrors($user->getErrors());
        }
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

	public function getPhotos($id)
	{
		$query = Img::with('user')->where('user_id', $id);

        $images = $query->get();

		return View::make('users.photos')->with(array('images' => $images)); 


	}

	public function getFollowers($id)
	{
		$followers = User::find($id)->followedUsers();

		return View::make('users.following')->with(array('followers' => $followers));

	}

	public function getEvents($id)
	{
		$query = Event::with('user')->where('user_id', $id);

        $events = $query->get();

		return View::make('users.events')->with(array('events' => $events)); 

	}

	public function getNotifications()
	{
		$id = Auth::user()->id;

		$query = Auth::user()->notifications()->with('sourceUser')->where('read',false);

		$notifications = $query->get();

		foreach($notifications as $notification)
		{
			$notification->read = '1';
			$notification->save();
		}

		return View::make('notifications.index')->with(['notifications' => $notifications]);

	}


}
