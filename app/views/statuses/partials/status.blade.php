<article class="media status-media">
	<div class="pull-left">
		<p class="media-object"><img class="profile-img" src="{{ $status->user->img }}"></p>
	</div>
	
 	@if($status->user == Auth::user())
	<div class="pull-right">

		{{ Form::open([ 'action' => array('StatusController@destroy', $status->id), 'method' => 'delete' ]) }}
			<button type="submit" class="btn btn-sm btn-danger">Remove</button>
		{{ Form::close() }}

	</div>
	@endif

	<div class="media-body">
		<h4 class="media-heading">{{ link_to_route('profile_path', $status->user->user_name, $status->user->user_name)}}</h4>
		<p> {{ $status->created_at->diffForHumans() }}</p>

		{{ $status->body }}

		<!-- unfollow button, place somewhere for easy access
		@include('users.follow-form', ['user' => $status->user]) -->

	</div>

</article>


@if($signedIn)

	{{ Form::open(['route'=> ['comment_path', $status->id], 'class' => 'commentsForm']) }}
		{{ Form::hidden('status_id', $status->id) }}


		<div class="form-group">

				{{ Form::textarea('body',null, ['class' => 'form-control', 'rows' => 1.5,'placeholder' => 'Create a comment...' ]) }}

		</div>


	{{ Form::close() }}
@endif

@unless ($status->comments->isEmpty())
	<div class="comments">
		@foreach($status->comments as $comment)	
			@include('statuses.partials.comment')

		@endforeach
	</div>
@endunless