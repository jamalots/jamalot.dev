<article class="comments_comment media">

	<div class="pull-left">
		<p class="media-object"><img class="profile-img" src="{{ $comment->owner->img }}"></p>
	</div>
	@if(($comment->owner == Auth::user()) || $status->user == Auth::user())
	<div class="pull-right">
		{{ Form::open([ 'action' => array('CommentsController@destroy', $comment->id), 'method' => 'delete' ]) }}
			<button type="submit" class="btn btn-sm btn-danger">Delete Comment</button>
		{{ Form::close() }}
	</div>
	@endif

	<div class="media-body">
		<h4 class="media-heading">{{ $comment->owner->user_name }}</h4>
		<p> {{ $status->created_at->diffForHumans() }}</p>

		{{ $comment->body }}

	</div>

</article>