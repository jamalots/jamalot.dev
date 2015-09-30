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

Route::post('statuses/{id}/comments', [
	'as' => 'comment_path',
	'uses' => 'CommentsController@store'

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


Route::delete('deleteStatus/{id}',[
	'as' => 'deleteStatus_path',
	'uses' => 'StatusController@destroy'

]);

Route::delete('deleteComment/{id}',[
	'as' => 'deleteComment_path',
	'uses' => 'CommentsController@destroy'

]);


Route::get('testlogin', 'PagesController@getTest');



Route::get('testlogin', 'PagesController@getTest');


Route::controller('password', 'RemindersController');

Route::get('events/manage', 'EventsController@getManage');

// Route::get('events/getEvent/{$id}', 'EventsController@getEvent');




Route::get('users/musicians', 'UsersController@musicians');

Route::get('users/bands', 'UsersController@bands');

Route::get('users/{id}/photos', 'UsersController@getPhotos');

Route::resource('users', 'UsersController');

Route::get('registration/{id}', 'EventsController@showRegistration');
Route::get('addRegistration/{id}', 'EventsController@registerUser');
Route::get('deleteConfirmation/{id}', 'EventsController@showDeleteConfirmation');
Route::delete('removeRegistration/{id}', [
	'as' => 'removeRegistration_path',
	'uses' =>'EventsController@unregisterUser'
]);

Route::get('users/{id}/followers', 'FollowsController@showFollowers');
Route::get('users/{id}/followedUsers','FollowsController@showFollowedUsers');

Route::resource('events', 'EventsController');