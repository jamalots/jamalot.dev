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
		<a href="{{ action('UsersController@show', $status->user->id) }}">
		@if($status->user->user_type == 'Band')
				<h4 class="media-heading">{{ $status->user->band_name }}</h4>
            @elseif($status->user->user_type == 'Musician')
				<h4 class="media-heading">{{ $status->user->first_name }} {{ $status->user->last_name }}</h4>
            @else
				<h4 class="media-heading">{{ $status->user->user_name }}</h4>
            @endif
		</a>
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

<div class="comments">
@unless ($status->comments->isEmpty())
		@foreach($status->comments as $comment)	
			@include('statuses.partials.comment')

		@endforeach
@endunless
</div>