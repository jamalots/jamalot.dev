@extends('layouts.master')


<style>
body
{
    font-family: 'Open Sans', sans-serif;
    background-color:#040404;
    color:#B09A9A;
}

#prof
{
	position:absolute;
}
#upevents
{
    top:1500px;
    width: 400px;
    border-bottom-width: 1px;
    padding-top:175px;
    border-bottom-style: solid;
    border-bottom-color: black;

}

#scroller
{
   overflow-y: auto; 
    height:300px; 
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
	right:60px;
	top:28px;
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

#map-canvas {
    top:550;
    height: 300px;
    width:300px;
    
}
</style>
@section('content')


<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="fb-profile" id="prof">
       <img  align="left" class="fb-image-lg" src="{{ $event->cover_img }}" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{ $event->img }}" alt="Profile image example"/>
        <div class="fb-profile-text">



            @if($event->user->user_type == 'Musician')
                <h1><strong>{{ $event->user->first_name }} {{ $event->user->last_name }}</strong> <small>{{ $event->user->user_type }}</small></h1>
            @elseif($event->user->user_type == 'Band')
                <h1><strong>{{ $event->user->band_name }}</strong> <small>{{ $event->user->user_type }}</small></h1>
            @else
                <h1><strong>{{ $event->user->user_name }}</strong> <small>{{ $event->user->user_type }}</small></h1>

            @endif
            <h3><em>at</em></h3>
            <h1><strong>{{ $event->venue }}</strong></h1>

            <div class="col-md-2">
            <p><strong>price</strong> || ${{ $event->price }} </p>
            <p><strong>starting at</strong> || {{ $event->start_time }} </p>
            <p><strong>on</strong> || {{ date('n/d/Y ', strtotime($event->date)) }} </p>
            <p class="textarea"><strong>the skinny ||</strong> <br> {{{ $event->description }}} </p>

            @if(Auth::check())
                @if(Auth::user()->eventsAttending->contains($event->id))
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myUnregisterModal">
                        Unregister
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myUnregisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Not going?! Seriously?</h4>
                          </div>
                          <div class="modal-body">
                          <h1>Are you sure you you're not going?</h1> <br/>


                            {{ Form::open([ 'method' => 'DELETE','route' => ['removeRegistration_path',$event->id] ]) }}
                                <button type="submit" class="btn btn-primary">Yes</button>

                            {{ Form::close() }}
                            <!-- <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a> -->
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                          <div class="modal-footer">
                            <!-- <a href="{{ action('EventsController@showDeleteConfirmation', $event->id)}}" class="btn btn-warning">Unregister</a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                @else

                
                <!-- modal button  -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myRegisterModal">
                        Register
                    </button>
               
                    <!-- Modal -->
                    <div class="modal fade" id="myRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group ">
                                <p class="paraFont"><strong>Venue:</strong> {{$event->venue}}</p>
                            </div>
                            <div class="form-group ">
                                <p class="paraFont"><strong>Attendees:</strong>
                                @foreach($event->attendees as $attendee)
                                    <p>{{$attendee->user_name}}</p>
                                @endforeach
                                </p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="{{ action('EventsController@registerUser', $event->id)}}" class="btn btn-primary btn-lg btn-block">Register For This Event!</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <a href="{{ action('EventsController@showRegistration', $event->id) }}" class="btn btn-primary">Register</a> -->
                @endif
           
            @endif

            </div>
        </div>
    </div>
</div> <!-- /container -->  
<!-- <div class="row">

	<div class="col-md-4 col-xs-6"></div>
		<div class="col-md-8 col-xs-12">
			{{ $event->music }}
		</div>
	
</div> -->
<div class="col-md-3"></div>
    <div class="col-md-4 map-canvas">
        <div id="map-canvas"></div>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhRMZMvQrojZ4l73J2OCrxEuvCjm88l9I"></script>

         

         <script type="text/javascript">
         
         (function() {
                "use strict";
                // Set our map options
                var address = "{{$event->address}}, {{$event->city}}, {{$event->state}}, {{$event->zip_code}}";
                var mapOptions = {
                    // Set the zoom level
                    zoom: 10,
                };
                var geocoder = new google.maps.Geocoder();

                var marker;
                // Geocode our address
                geocoder.geocode({ "address": address }, function(results, status) {
                // Check for a successful result
                    if (status == google.maps.GeocoderStatus.OK) {
                       // Recenter the map over the address
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            // icon: '/img/marker.tiff'
                        });
                       // Create a new infoWindow object with content
                        var infowindow = new google.maps.InfoWindow({
                            content: " {{{$event->user->user_name}}} at {{{$event->venue}}} "
                        });

                        // Open the window using our map and marker
                        infowindow.open(map, marker);
                   } else {
                       // Show an error message with the status if our request fails
                       alert("Geocoding was not successful - STATUS: " + status);
                   }
                });

                
                
                var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            })();   



        </script>

    </div>
    <div>
        <div class="row">
            <div class="col-md-7"></div>
                <div class="col-md-5">
                
                <h3 id="upevents">Upcoming Events at {{{$event->venue}}} </h3>
                <div id="scroller">
                @foreach($venues as $venue)
                    @if($venue->venue)
                        @if($venue->user->band_name == !null)
                            <a href=" /events/{{{$venue->id}}} ">
                                <p style="width:500px;"><strong> {{{ $venue->user->band_name}}} </strong>on<strong> {{{ date('n/d/Y ', strtotime($venue->date))}}}</strong></p>
                            </a>
                        @else
                            <a href=" /events/{{{$venue->id}}} ">
                                <p style="width:500px;"><strong> {{{ $venue->user->user_name}}} </strong>on<strong> {{{ date('n/d/Y ', strtotime($venue->date))}}}</strong></p>
                            </a>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>

@stop