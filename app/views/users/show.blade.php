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

#statuses
{
    overflow-y: auto; 
    height:1000px; 
}

.opps
{
    overflow-y: auto; 
    height:300px;   
}

#upevents
{
    width: 250px;
    border-bottom-width: 1px;
    padding-top: 25px;
    border-bottom-style: solid;
    border-bottom-color: black;
}

#coverbtn
{
    top:20;
    left: 500px;
}

.about
{
    left:90;
}

.stats
{
    padding-top: 550px;
    left:40px;
    top:150;
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
       <img  align="left" class="fb-image-lg" src="{{ $user->cover_img or 'http://lorempixel.com/1130/363/nature/'}}" alt="Profile image example"/>

        <a href="{{ action('UsersController@getPhotos', $user->id) }}">
            <img align="left" class="fb-image-profile thumbnail" src="{{ $user->img or 'http://lorempixel.com/640/480/sports/' }}" alt="Profile image example"/>
        </a>
        <div class="fb-profile-text">
            <div class="col-md-7"></div>
            <div class="col-md-5 about">
            @if($user->user_type == 'Band')
                <h1><strong>{{ $user->band_name }}</strong> <small>{{ $user->user_type }}</small></h1>
            @elseif($user->user_type == 'Musician')
                <h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong> <small>{{ $user->user_type }}</small></h1>
            @else
                <h1><strong>{{ $user->user_name }}</strong></h1>

            @endif
            <p><strong>Location</strong> || {{ $user->location }} </p>
            <p><strong>Instruments</strong> || {{ $user->instrument }} </p>
            <p><strong>Genre</strong> || {{ $user->genre }} </p>
            <p><strong>About</strong> || {{ $user->about }} </p>
            </div>
            
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
            </div>
        </div>

        <div class="media-body" id="stat">

            <!-- <h1 class="media-heading">{{ $user->user_name}}</h1> -->

            <ul class="list-inline text-muted">
                <li><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $statusCount = $user->statuses->count() }} {{ str_plural('Status', $statusCount) }}</li>
                <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $followerCount = $user->followers()->count() }} {{ str_plural('Follower', $followerCount) }} </li>
            </ul>

            <p class="text-muted"></p>

            <!-- modal button -->
            @if(Auth::id() == $user->id)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-scissors" aria-hidden="true"></span>
                  Update Profile Pic
                </button><br>          
            @endif
            <!-- modal -->
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
                        <label for="img">Upload Profile Image:</label>
                        <input type="file" class="filestyle" name="img" data-buttonName="btn-primary" data-buttonBefore="true">               
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
            @if(Auth::id() == $user->id)
               <!--  <div class="col-md-8"></div>
                <div class="col-md-4"> -->
                <button id ="coverbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myCoverModal">
                  Update Cover Pic
                </button> 
                <!-- </div>            -->
            @endif
            <div class="modal fade" id="myCoverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Your cover Pic! Woop Woop!</h4>
                  </div>
                  <div class="modal-body">
                    {{ Form::model($user, array('action' => array('UsersController@update', Auth::id()), 'files'=>true, 'class' => 'horizontal', 'method' => 'PUT')) }}
                    <div class="form-group">
                        <label for="cover_img">Upload Cover Image:</label>
                        <input type="file" class="filestyle" name="cover_img" data-buttonName="btn-primary" data-buttonBefore="true">               
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
            @if(Auth::id() == $user->id)
               <!--  <div class="col-md-8"></div>
                <div class="col-md-4"> -->
                <button id ="coverbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myMusicModal">
                  Update Your Music
                </button> 
                <!-- </div>            -->
            @endif
            <div class="modal fade" id="myMusicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Paste in your Soundcloud link</h4>
                  </div>
                  <div class="modal-body">
                    {{ Form::model($user, array('action' => array('UsersController@update', Auth::id()), 'files'=>true, 'class' => 'horizontal', 'method' => 'PUT')) }}
                    <div class="form-group">
                        <label for="music">Pasta your link :</label>
                        <input type="string" class="filestyle" name="music" data-buttonName="btn-primary" data-buttonBefore="true" value="{{{$user->music}}}">               
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div><br>
            @if(Auth::id() == $user->id)
                <a href="{{ action('UsersController@edit', $user->id) }}"> Edit or Complete your Profile </a><br>
                <a href="{{ action('AdsController@create', $user->id) }}"> Create an Ad? Or maybe a Jam? </a><br>
                <a href="{{ action('EventsController@getManage', $user->id) }}"> Manage Your Events </a>
            @endif
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
                <h3 id="upevents">Your Ads/Jams</h3>
                @if(!$user->ads()->count() == 0)
                    @foreach($user->ads as $ad)
                        <a href="/ads/{{{$ad->id}}} ">

                            <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>
                        </a>
                    @endforeach
                @else
                    <p>This user has not posted any jams or ads.</p>
                @endif
            </div>
        </div>

        @if(Auth::id() == $user->id)
        <div> 
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <h3 id="upevents">Opportunities to Jam!</h3>
                    <div class="opps">
                        @foreach($opps as $ad)
                        @if($user->level == 'Professional')
                            <a href=" /ads/{{{$ad->id}}} ">
                                <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>
                            </a>
                            
                            @elseif($user->level == 'Semi-Pro' && $ad->level != 'Professional')
                                
                                <a href=" /ads/{{{$ad->id}}} ">
                                    <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>
                                </a>
                                
                            @elseif($user->level == 'Intermediate' && $ad->level != 'Professional' && $ad->level != 'Semi-Pro')
                                
                                <a href=" /ads/{{{$ad->id}}} ">
                                    <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>
                                </a>
                                
                            @elseif($user->level == 'Beginner' && $ad->level != 'Professional' && $ad->level != 'Semi-Pro' && $ad->level != 'Intermediate')
                                
                                <a href=" /ads/{{{$ad->id}}} ">
                                    <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{{ $ad->ad_title}}} </p>
                                </a>
                                
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">Hosted Events</h3>
                @if(!$user->events()->count() == 0)
                    @foreach($user->events as $event)
                        <a href=" /events/{{{$event->id}}} ">

                            <p style="width:300px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>At</strong> {{{ $event->venue}}} <strong>on</strong> {{ date('n/d/Y ', strtotime($event->date)) }} {{{ $event->start_time }}}</p>
                        </a>
                    @endforeach
                @else
                    <p>This user is not hosting any upcoming events.</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">Events Attending</h3>
                @if(!$user->eventsAttending()->count() == 0)
                    @foreach($user->eventsAttending as $attending)
                        <a href=" /events/{{{$attending->id}}} ">
                            <p style="width:300px;"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> <strong>At</strong> {{{ $attending->venue}}} <strong>on</strong>  {{ date('n/d/Y ', strtotime($attending->date)) }}</p>
                        </a>
                    @endforeach
                @else
                    <p>This user is not attending any upcoming events.</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">Followers</h3>
                    @if(!$followerCount == 0)
                        @foreach($user->followers as $follower)
                            @if($follower->user_type == 'Band')
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->band_name}}</p></a>
                            @elseif($follower->user_type == 'Musician')
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->first_name}} {{$follower->last_name}}</p></a>
                            @else
                                <a href="{{ action('UsersController@show', $follower->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$follower->user_name}}</p></a>

                            @endif
                        @endforeach 
                        <a href="{{ action('FollowsController@showFollowers', $user->id) }}"><p>View All</p></a> 
                    @else
                        <p>This user does not have any followers.</p> 
                    @endif           
            </div>              
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">Following</h3>
                    @if(!$user->followedUsers()->count() == 0)
                        @foreach($user->followedUsers as $followed)
                            @if($followed->user_type == 'Band')
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->band_name}}</p></a>
                            @elseif($followed->user_type == 'Musician')
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->first_name}} {{$followed->last_name}}</p></a>
                            @else
                                <a href="{{ action('UsersController@show', $followed->id) }}"><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$followed->user_name}}</p></a>

                            @endif                            
                        @endforeach
                        <a href="{{ action('FollowsController@showFollowedUsers', $user->id) }}"><p>View All</p></a>
                    @else
                     <p>This user is not following anyone.</p> 
                    @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-6">
                <h3 id="upevents">My Photos</h3>
                    @if(!$user->images->count() == 0)
                        <a href="{{ action('UsersController@getPhotos', $user->id) }}"><p>View All</p></a>
                    @else
                        <p>This user does not have any photos.</p>
                    @endif

            </div>
        </div>
            

    </div>

    <div class="col-md-6 stats">
        
        @if($user->is($currentUser))

            @include('statuses.partials.publish-status-form')

        @endif
    <div id="statuses">

        @include('statuses.partials.statuses', ['statuses' => $user->statuses])
    </div>
    </div>
</div>

<script type="text/javascript">
$(":file").filestyle({buttonName: "btn-primary", buttonBefore: true, });
</script>


@stop