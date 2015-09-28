@extends('layouts.master')


@section('content')

<div class="row">
	<div class="col-md-4">

		<div class="media">
			<div class="pull-left">
				<img src="{{ $user->img }}" alt="Profile pic here">
			</div>
		</div>

		<div class="media-body">

			<h1 class="media-heading">{{ $user->user_name}}</h1>

			<ul class="list-inline text-muted">
				<li>{{ $statusCount = $user->statuses->count() }} {{ str_plural('Status', $statusCount) }}</li>
				<li>{{ $followerCount = $user->followers()->count() }} {{ str_plural('Follower', $followerCount) }} </li>
			</ul>

			<p class="text-muted"></p>

			@unless($user->is($currentUser))
				@include('users.follow-form')
			@endunless
		</div>


<!-- 		show user profile pics of followers
 -->
		<!-- @foreach($user->followers as $follower)
			
			<img src="{{ $follower->img }}" alt="Profile pic here">

		@endforeach -->

	</div>

	<div class="col-md-6">
		
		@if($user->is($currentUser))

			@include('statuses.partials.publish-status-form')

		@endif


		@include('statuses.partials.statuses', ['statuses' => $user->statuses])
	</div>
</div>


@stop