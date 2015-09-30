@extends('layouts.master')


<style>
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
</style>
@section('content')


<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="fb-profile" id="prof">
       <img  width="1129.500" height="372" align="left" class="fb-image-lg" src="{{ $user->cover_img }}" alt="Profile image example"/>
        <img width="relative" height="185" align="left" class="fb-image-profile thumbnail" src="{{ $user->img }}" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><strong>{{ $user->first_name }} {{$user->last_name}}</strong> <small>{{ $user->user_name}}</small></h1>
            <p><strong>location</strong> || {{ $user->location }} </p>
            <p><strong>main instrument</strong> || {{ $user->instrument }} </p>
            <p><strong>industry role</strong> || {{ $user->industry_role }} </p>
        </div>
    </div>
</div> <!-- /container -->  
<div class="row">

	<div class="col-md-4 col-xs-6"></div>
		<div class="col-md-8 col-xs-12">
			<!-- {{ $user->music }} -->
		</div>
	
</div>

<div class="row">
    <div class="col-md-4">

        <div class="media">
            <div class="pull-left">
               <!--  <img src="{{ $user->img }}" alt="Profile pic here"> -->
            </div>
        </div>

        <div class="media-body" id="stat">

            <!-- <h1 class="media-heading">{{ $user->user_name}}</h1> -->

            <ul class="list-inline text-muted">
                <li>{{ $statusCount = $user->statuses->count() }} {{ str_plural('Status', $statusCount) }}</li>
                <li>{{ $followerCount = $user->followers()->count() }} {{ str_plural('Follower', $followerCount) }} </li>
            </ul>

            <p class="text-muted"></p>

            @if(Auth::id() == $user->id)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Update Profile Pic
                </button>            
            @endif
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Your Profile Pic! Woop Woop!</h4>
                  </div>
                  <div class="modal-body">
                    {{ Form::model($user, array('action' => array('UsersController@update', Auth::id()), 'files'=>true, 'class' => 'horizontal', 'method' => 'PUT')) }}
                    <div class="form-group">
                                        {{-- <div class="col-md-6"> --}}
                                        {{ Form::label('img', 'Change Profile Pic') }}
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-info btn-file">Browse 
                                                    {{ Form::file('img') }}
                                                    </span>
                                                </span>
                                                {{ Form::text('img', null, ['class' => 'form-control', 'readonly']) }}
                                            </div>
                                        {{-- </div> --}}
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>
            @unless($user->is($currentUser))
                @include('users.follow-form')
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                {{ $user->music }}
            </div>
        </div>

         <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">Upcoming Events</h3>
                @foreach($user->events as $event)
                    <a href=" /events/{{{$event->id}}} ">
                        <p style="width:300px;"><strong>At</strong> {{{ $event->venue}}} <strong>on</strong> {{{ $event->date}}}</p>
                    </a>
                @endforeach
            </div>
        </div>
            
    


<!--        show user profile pics of followers
 -->
        <!-- @foreach($user->followers as $follower)
            
            <img src="{{ $follower->img }}" alt="Profile pic here">

        @endforeach -->

    </div>

    <div class="col-md-6 stats">
        
        @if($user->is($currentUser))

            @include('statuses.partials.publish-status-form')

        @endif


        @include('statuses.partials.statuses', ['statuses' => $user->statuses])
    </div>
</div>



@stop