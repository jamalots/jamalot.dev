@if($statuses->count())
	@foreach($statuses as $status)

		@include('statuses.partials.status')

	@endforeach
@else
	<p>This Jamalot member has not posted any statuses yet.</p>
@endif