@extends('layouts.master')

@section('content')

<h1>Register! This doesn't Work Yet</h1>

@include('layouts.partials.errors')

<div class="col-md-6">
	{{ Form::open(['route' => 'register_path'])}}
		<div class="form-group">

			{{ Form::label('user_name', 'Username:') }}
			{{ Form::text('user_name',null, ['class' => 'form-control']) }}

		</div>

		<div class="form-group">

			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email',null, [ 'class' => 'form-control']) }}

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
</div>

@stop