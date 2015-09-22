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



Route::get('/', 'PagesController@home');
Route::resource('events', 'EventsController');

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


Route::resource('users', 'UsersController');

Route::resource('events', 'EventsController');

<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
>>>>>>> 41ec2c1dec39bb5f32e57e9c5c49960ed9e5b14e
>>>>>>> master
>>>>>>> master
>>>>>>> f3e9fcd086a6bd4066d320b68dbd164fea04867c
