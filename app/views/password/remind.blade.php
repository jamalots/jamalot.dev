@extends('layouts.master')



@section('content')


<div class="row">
	<div class="col-md-6">

		<h1>Need to Reset Your Password?</h1>

		{{ Form::open() }}

			<div class="form-group">

				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email',null, [ 'class' => 'form-control', 'required']) }}

			</div>

			<div class="form-group">

				{{ Form::submit('Reset password', [ 'class' => 'btn btn-primary','form-control']) }}

			</div>

		{{ Form::close()}}

	</div>
</div>


@stop