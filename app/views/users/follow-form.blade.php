@if($signedIn)
	@if($user->isFollowedBy($currentUser))

		{{ Form::open([ 'method' => 'DELETE','route' => ['follow_path',$user->id] ]) }}
			{{ Form::hidden('userIdToUnfollow', $user->id) }}
			<button type="submit" class="btn btn-danger">Unfollow {{ $user->user_name }}</button>

		{{ Form::close() }}

	@else
		{{ Form::open([ 'route' => 'follows_path' ]) }}
			{{ Form::hidden('userIdToFollow', $user->id) }}
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Follow {{ $user->user_name }}</button>

		{{ Form::close() }}
	@endif
@endif