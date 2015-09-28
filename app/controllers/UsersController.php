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
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('users.index');
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

		return View::make('users.show', compact('user'));
	}



	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
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
        $directory = 'img/uploads/';
        $image = Input::file('img');
    
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->instrument = Input::get('instrument');
        $user->location = Input::get('location');
        $user->genre = Input::get('genre');
        $user->about = Input::get('about');
        $user->level = Input::get('level');
        $user->user_type = Input::get('user_type');
        if (Input::hasFile('img')) {
            $user->img = $image->move($directory);
        } else {
        	$user->img = '/img/monty.jpg';
        }
        $user->cover_img = '/img/table.jpg';
        if ($user->save()) {
            Session::flash('successMessage', 'You edited ' . $user->user_name . '\'s account successfully');
            return Redirect::action('UsersController@show', $id);
        } else {
            Session::flash('errorMessage', 'Could not save user.');
            dd($user->getErrors()->toArray());
            return Redirect::action('UsersController@index')
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



}
