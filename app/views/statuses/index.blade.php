@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
		<h1>Post a Status</h1>

		@include('layouts.partials.errors')

		<div class="status-post">
			{{ Form::open()}}

				<div class="form-group main-post">

					{{ Form::textarea('body',null, ['class' => 'form-control','rows'=>3, 'placeholder' => "What's on your mind?"]) }}

				</div>

				<div class="form-group status-post-submit">

					{{ Form::submit('Post Status', [ 'class' => 'btn btn-primary']) }}

				</div>

				@foreach($statuses as $status)

					@include('statuses.partials.status')

				@endforeach


			{{ Form::close()}}
		</div>

	</div>
</div>

@stop