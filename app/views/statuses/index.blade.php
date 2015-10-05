@extends('layouts.master')
<style type="text/css">
	.jumbotron {
		text-align: center;
	}
		body
	{
	    font-family: 'Open Sans', sans-serif;
	}

	#stat
	{
	    padding-top: 500px;
	    padding-left: 100px;
	}

	#upevents
	{
	    width: 250px;
	    border-bottom-width: 1px;
	    padding-top: 25px;
	    border-bottom-style: solid;
	    border-bottom-color: black;
	}

	.stats
	{
	    padding-top: 550px;
	    left:40px;
	}

	#prof
	{
		position:absolute;
	}

	.fb-profile img.fb-image-lg{
	    z-index: 0;
	    width: 100%;  
	    margin-bottom: 10px;
	    padding-right: 85px;
	}

	.fb-image-profile
	{
	    margin: -90px 10px 0px 50px;
	    z-index: 9;
	    width: 20%; 
	}

	.player
	{
		position: relative;
		z-index: 15;
		left:50px;
		top:28px;
	    width:300px;
	}

	@media (max-width:768px)
	{
	    
	.fb-profile-text>h1{
	    font-weight: 700;
	    font-size:16px;
	}

	.fb-image-profile
	{
	    margin: -45px 10px 0px 25px;
	    z-index: 9;
	    width: 20%;

	}
	}
	#prof-pic {
		height: 200px;
		width: 200px;
		text-align: center;

	}
	.fixing {
		position:fixed;
	}
	


</style>
@section('content')

<div class="jumbotron">
	<div class="page-header">
		<h1>Welcome To Jam-A-Lot <span class="glyphicon glyphicon-cd" aria-hidden="true"></span><br><small>
			@if($currentUser->user_type == 'Band')
				{{ $currentUser->band_name }}
			@elseif($currentUser->user_type == 'Musician')
				{{ $currentUser->first_name }} {{ $currentUser->last_name }}
			@else
				{{ $currentUser->user_name }}
			@endif
		</small></h1>
	</div>

</div>

<div class="row">
    <div class="col-md-3">

    	<h3 id="upevents">Followers</h3>
                    @if(!$currentUser->followers()->count() == 0)
                        @foreach($currentUser->followers as $follower)
                            @if($follower->user_type == 'Band')
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->band_name}}</p></a>
                            @elseif($follower->user_type == 'Musician')
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->first_name}} {{$follower->last_name}}</p></a>
                            @else
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->user_name}}</p></a>

                            @endif
                        @endforeach 
                        <a href="{{ action('FollowsController@showFollowers', $currentUser->id) }}"><p>View All</p></a> 
                    @else
                        <p>This user does not have any followers.</p> 
                    @endif   

                    <h3 id="upevents">Following</h3>
                    @if(!$currentUser->followedUsers()->count() == 0)
                        @foreach($currentUser->followedUsers as $followed)
                            @if($followed->user_type == 'Band')
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->band_name}}</p></a>
                            @elseif($followed->user_type == 'Musician')
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->first_name}} {{$followed->last_name}}</p></a>
                            @else
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->user_name}}</p></a>

                            @endif                            
                        @endforeach
                        <a href="{{ action('FollowsController@showFollowedUsers', $currentUser->id) }}"><p>View All</p></a>
                    @else
                     <p>This user is not following anyone.</p> 
                    @endif   
	
    </div>


		<div class="col-md-6 posting">
			
			@include('statuses.partials.publish-status-form')
			<div class="scroller2">
				@include('statuses.partials.statuses')
			</div>
		</div>


    <div class="col-md-3">

                <h3 id="upevents">Your Ads/Jams</h3>
                @if(!$currentUser->ads()->count() == 0)
                    @foreach($currentUser->ads as $ad)
                        <a href=" /ads/{{{$ad->id}}} ">

                            <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>


                        </a>
                    @endforeach
                @else
                    <p>This user has not posted any jams or ads.</p>
                @endif

                <h3 id="upevents">Hosted Events</h3>
                @if(!$currentUser->events()->count() == 0)
                    @foreach($currentUser->events as $event)
                        <a href=" /events/{{{$event->id}}} ">

                            <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>At</strong> {{{ $event->venue}}} <strong>on</strong> {{{ $event->date}}}</p>
                        </a>
                    @endforeach
                @else
                    <p>This user is not hosting any upcoming events.</p>
                @endif

                <h3 id="upevents">Events Attending</h3>
                @if(!$currentUser->eventsAttending()->count() == 0)
                    @foreach($currentUser->eventsAttending as $attending)
                        <a href=" /events/{{{$attending->id}}} ">
                            <p style="width:300px;"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> <strong>At</strong> {{{ $attending->venue}}} <strong>on</strong> {{{ $attending->date}}}</p>
                        </a>
                    @endforeach
                @else
                    <p>This user is not attending any upcoming events.</p>
                @endif

 	
    </div>

</div>


@stop