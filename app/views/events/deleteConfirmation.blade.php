@extends('layouts.master')

<style type="text/css">
	body {
		padding-top: 200px;
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


</style>


@section('content')


<h1>Are you sure you want to unregister for this event?</h1> <br/>


		{{ Form::open([ 'method' => 'DELETE','route' => ['removeRegistration_path',$id] ]) }}
			<button type="submit" class="btn btn-primary">Yes</button>

		{{ Form::close() }}

			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>


			<!-- <a href="{{{ action('EventsController@unregisterUser', $id )}}}" class="btn btn-lg">Yes</a>
<a href="{{{ action('EventsController@show', $id) }}}" class="btn btn-lg">Cancel</a> -->



@stop