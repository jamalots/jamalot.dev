@extends('layouts.master')

@section('content')

<h1>Register! This doesn't Work Yet</h1>

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach

		</ul>
	</div>
@endif

{{ Form::open(['route' => 'register_path'])}}
	<div class="form-group">

		{{ Form::label('user_name', 'Username:') }}
		{{ Form::text('user_name',null, ['class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('first_name', 'First Name:') }}
		{{ Form::text('first_name',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('last_name', 'Last Name:') }}
		{{ Form::text('last_name',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('location', 'Location:') }}
		{{ Form::text('location',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('instrument', 'Instrument:') }}
		{{ Form::text('instrument',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('fb_link', 'Facebook Link:') }}
		{{ Form::text('fb_link',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('level', 'Playing Level:') }}
		{{ Form::text('level',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('original', 'Original:') }}
		{{ Form::text('original',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('industry_role', 'Industry Role:') }}
		{{ Form::text('industry_role',null, [ 'class' => 'form-control', 'required' => 'required']) }}

	</div>

	<div class="form-group">

		{{ Form::label('genre', 'Playing Genre:') }}
		{{ Form::text('genre',null, [ 'class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::label('about', 'About/bio:') }}
		{{ Form::textarea('about',null, [ 'class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password',[ 'class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::label('password_confirmation', 'Password Confirmation:') }}
		{{ Form::password('password_confirmation',[ 'class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::submit('Sign Up', [ 'class' => 'btn btn-primary']) }}

	</div>


{{ Form::close()}}

@stop