@extends('layouts.master')


@section('content')

<div class="row">
	<div class="col-md-3">
		<h1>{{ $user->user_name}}</h1>
		<img src="{{ $user->img }}" alt="Profile pic here">

		@unless($user->is($currentUser))
			@include('users.follow-form')
		@endif

	</div>

	<div class="col-md-6">
		
		@if($user->is($currentUser))

			@include('statuses.partials.publish-status-form')

		@endif


		@include('statuses.partials.statuses', ['statuses' => $user->statuses])
	</div>
</div>


@stop