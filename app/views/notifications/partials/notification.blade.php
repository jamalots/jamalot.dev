<article class="media status-media">
	<div class="pull-left">
		<p class="media-object"><img class="profile-img" src="{{ $notification->source_user->img }}"></p>
	</div>
	

	<div class="media-body">
		@if( $notification->source_user->user_type == 'Band')
			@if( $notification->notification_type == 'following')
				<p>{{ $notification->source_user->band_name }} is now following you.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>
			@elseif( $notification->notification_type == 'registered')
				<p>{{ $notification->source_user->band_name }} registered for your event.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>
			@elseif( $notification->notification_type == 'commented')
				<p>{{ $notification->source_user->band_name }} commented on your status.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>	
			@endif
		@elseif($notification->source_user->user_type == 'Musician')
			@if( $notification->notification_type == 'following')
				<p>{{ $notification->source_user->first_name }} {{ $notification->source_user->last_name }} is now following you.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>
			@elseif( $notification->notification_type == 'registered')
				<p>{{ $notification->source_user->first_name }} {{ $notification->source_user->last_name }} registered for your event.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>
			@elseif( $notification->notification_type == 'commented')
				<p>{{ $notification->source_user->first_name }} {{ $notification->source_user->last_name }} commented on your status.</p>
				<p>{{ $notification->created_at->diffForHumans() }}</p>	
			@endif
		@endif
	</div>

</article>



