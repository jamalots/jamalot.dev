<article class="comments_comment media">

	<div class="pull-left">
		<a href="{{ action('UsersController@show', $comment->owner->id) }}">
			<p class="media-object"><img class="comment-img" src="{{ $comment->owner->img }}"></p>
		</a>
	</div>
	@if(($comment->owner == Auth::user()) || $status->user == Auth::user())
	<div class="pull-right">
		{{ Form::open([ 'action' => array('CommentsController@destroy', $comment->id), 'method' => 'delete' ]) }}
			<button type="submit" class="btn btn-sm btn-danger">Delete Comment</button>
		{{ Form::close() }}
	</div>
	@endif

	<div class="media-body">
		@if($comment->owner->user_type == 'Band')
			<h4 class="media-heading">{{ $comment->owner->band_name }}</h4>
		@elseif($comment->owner->user_type == 'Musician')
			<h4 class="media-heading">{{ $comment->owner->first_name }} {{ $comment->owner->last_name }}</h4>
		@else
			<h4 class="media-heading">{{ $comment->owner->user_name }}</h4>
		@endif
		<p> {{ $status->created_at->diffForHumans() }}</p>

		{{ $comment->body }}

	</div>

</article>