@forelse($notifications as $notification)

	@include('notifications.partials.notification')

@empty

	<p>You have no new notifications.</p>
	
@endforelse
