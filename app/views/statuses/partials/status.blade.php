<article class="media status-media">
	<div class="pull-left">
		<p class="media-object">Profile Pic</p>
	</div>
		
	<div class="media-body">
		<h4 class="media-heading"> {{ $status->user->user_name }}</h4>
		<p> {{ $status->created_at->diffForHumans() }}</p>
		{{ $status->body }}
	</div>

</article>