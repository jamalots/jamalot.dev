@extends('layouts.master')

<style type="text/css">
	body {
		padding-top: 50px;
		text-align: center;
	}
	body h1 {
		text-align: center;
	}
	.form-group {
		width:40%;
		margin-left: auto;
		margin-right: auto;
	}
	img {
		margin-right: auto;
		margin-left: auto;
	}
	.paraFont {
		font-size: 30px;
	}





</style>

@section('content')

<h1>Event Registration Page</h1>


<p>{{$event->description}}</p>




	<div class="row text-center col-md-12">
	<div class="form-group">
		<img class="img-responsive" src="">
	</div>
	</div>
	<div class="form-group ">
		<p class="paraFont"><strong>Venue:</strong> {{$event->venue}}</p>
	</div>
	<div class="form-group ">
		<p class="paraFont"><strong>Attendees:</strong>
		@foreach($users as $user)
			<p>{{$user->user_name}}</p>
		@endforeach
		</p>
	</div>

	<div class="form-group">
		<a href="{{ action('EventsController@registerUser', $event->id)}}" class="btn btn-primary btn-lg btn-block">Register For This Event!</a>

	</div>



@stop