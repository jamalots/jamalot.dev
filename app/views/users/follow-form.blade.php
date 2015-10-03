@if($signedIn)
	@if($user->isFollowedBy($currentUser))

		{{ Form::open([ 'method' => 'DELETE','route' => ['follow_path',$user->id] ]) }}
			{{ Form::hidden('userIdToUnfollow', $user->id) }}
			@if($user->user_type == 'Band')
				<button type="submit" class="btn btn-danger">Unfollow {{ $user->band_name }}</button>
			@elseif($user->user_type == 'Musician')
				<button type="submit" class="btn btn-danger">Unfollow {{ $user->first_name }} {{ $user->last_name }}</button>
			@else
				<button type="submit" class="btn btn-danger">Unfollow {{ $user->user_name }}</button>
			@endif
		{{ Form::close() }}

	@else
		{{ Form::open([ 'route' => 'follows_path' ]) }}
			{{ Form::hidden('userIdToFollow', $user->id) }}
			@if($user->user_type == 'Band')
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Follow {{ $user->band_name }}</button>
			@elseif($user->user_type == 'Musician')
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Follow {{ $user->first_name }} {{ $user->last_name }}</button>
			@else
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Follow {{ $user->user_name }}</button>
			@endif

		{{ Form::close() }}
	@endif
@endif