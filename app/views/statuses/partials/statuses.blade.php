@forelse($statuses as $status)

	@include('statuses.partials.status')

@empty

	<p>This Jamalot member has not posted any statuses yet.</p>
@endforelse



