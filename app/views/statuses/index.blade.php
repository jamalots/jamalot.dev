@extends('layouts.master')

@section('content')

<h1>Post a Status</h1>

{{ Form::open()}}

	<div class="form-group">

		{{ Form::label('Body', 'Status:') }}
		{{ Form::textarea('Body',null, ['class' => 'form-control']) }}

	</div>

	<div class="form-group">

		{{ Form::submit('Post Status', [ 'class' => 'btn btn-primary']) }}

	</div>

	<h2>Statuses</h2>

	@foreach($statuese as $status)
		<article>
				
			{{ $status->body }}

		</article>

	@endforeach


{{ Form::close()}}

@stop