<article class="comments_comment media">

	<div class="pull-left">
		<p class="media-object">Profile Pic</p>
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{ $comment->owner->user_name }}</h4>
		<p> {{ $status->created_at->diffForHumans() }}</p>

		{{ $comment->body }}

	</div>

</article>