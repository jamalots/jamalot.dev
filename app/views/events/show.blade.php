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
    width: 250px;
    border-bottom-width: 1px;
    padding-top: 25px;
    border-bottom-style: solid;
    border-bottom-color: black;
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
            <h1><strong>{{ $event->user->user_name }}</strong></h1>
            <h3><em>at</em></h3>
            <h1><strong>{{ $event->venue }}</strong></h1>
            <p><strong>price</strong> || {{ $event->price }} </p>
            <p><strong>starting at</strong> || {{ $event->start_time }} </p>
            <p><strong>on</strong> || {{ $event->date }} </p>
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
                @if(Auth::user_id())
                <h3 id="upevents">Upcoming Events at {{{$event->venue}}} </h3>
                @foreach($events as $event)
                    <a href=" /events/{{{$event->id}}} ">
                        <p style="width:300px;"><strong> {{{ $event->user->user_name}}} </strong><p>at</p> <strong> {{{ $event->date}}}</strong> 
                    </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>

@stop