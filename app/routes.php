<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', [ 
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'

]);

Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'

]);

Route::get('login',[
	'as' => 'login_path',
	'uses' => 'SessionsController@create'
]);

Route::post('login',[
	'as' => 'login_path',
	'uses' => 'SessionsController@store'
]);

Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'SessionsController@destroy'

]);

Route::get('statuses',[
	'as' => 'statuses_path',
	'uses' => 'StatusController@index'
]);

Route::post('statuses',[
	'as' => 'statuses_path',
	'uses' => 'StatusController@store'
]);

Route::get('/@{user_name}', [
	'as' => 'profile_path',
	'uses' => 'ProfileController@show'

]);

Route::post('follows', [

	'as' => 'follows_path',
	'uses' => 'FollowsController@store'
]);
Route::delete('follows/{id}', [

	'as' => 'follow_path',
	'uses' => 'FollowsController@destroy'
]);



Route::get('users/musicians', 'UsersController@musicians');

Route::get('users/bands', 'UsersController@bands');

Route::resource('users', 'UsersController');

Route::resource('events', 'EventsController');