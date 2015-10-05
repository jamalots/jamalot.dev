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
       <img  align="left" class="fb-image-lg" src="http://lorempixel.com/1103/363/nightlife/?27524" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{'/img/castle2.jpg' }}" alt="Profile image example"/>
        <div class="fb-profile-text">
            @if($ad->ad_type == 'Informal Jam' || $ad->ad_type == 'Formal Jam/Practice/Rehearsal' || $ad->ad_type == 'Payed Gig')
                <h1><strong>Wanted: {{$ad->ad_need }}</strong></h1>
                <h3><em>for a </em></h3>
                <h2><strong>{{ $ad->ad_type }}</strong></h2>
            @elseif($ad->ad_type == 'Offering Lessons')
                <h1><strong>Offering Lessons</strong></h1>
                <h3><em>for </em></h3>
                <h1><strong>{{ $ad->ad_need }}</strong></h1> 
            @elseif($ad->ad_type == 'Wanting Lessons')
                <h1><strong>Wanting Lessons</strong></h1>
                <h3><em>in </em></h3>
                <h1><strong>{{ $ad->ad_need }}</strong></h1>  
            @endif
            <div class="col-md-2">
            @if(Auth::check()) 
              @if(Auth::id() != $ad->user_id)
    		  {{ Form::open(array('action' => array('RequestsController@store'))) }}
    		      <input type="text" style="display:none" name="ad_id" class = "form-control" value="{{ $ad->id }}" >
    		      <input type="submit" name="submit" class="btn btn-primary" value="I'm Interested" id="interest"/>
    		  {{ Form::close()}}
              <input type="submit" name="submit" class="btn btn-success" value="Request Pending" style="display:none" id="pending" disabled="disabled"/>
              @endif

                    
            @endif
            <p><strong>Type</strong> || {{ $ad->ad_type }} </p>
            <p><strong>Title</strong> || {{ $ad->ad_title }} </p>
            <p><strong>Host</strong> || @if($ad->user->user_type == 'Musician')
				                {{ $ad->user->first_name }} {{ $ad->user->last_name }}
				            @elseif($ad->user->user_type == 'Band')
				                {{ $ad->user->band_name }}
				            @endif </p>
            <p><strong>Genre</strong> || {{ $ad->genre }} </p>
            <p><strong>Date</strong> || {{ date('n/d/Y ', strtotime($ad->date)) }} </p>
            <p><strong>Time</strong> || {{ date('g:i a ', strtotime($ad->start_time)) }}
            <p><strong>Equipment Provided</strong> || {{ $ad->equipment }} </p>
            <p class="textarea"><strong>the skinny ||</strong> <br> {{{ $ad->description }}} </p>
            <p style="display:none" id="idme">{{ $ad->user_id }}</p>
            </div>
        </div>
    </div>
</div> <!-- /container -->  

<div class="col-md-3"></div>
    <div class="col-md-4 map-canvas">
        <div id="map-canvas"></div>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhRMZMvQrojZ4l73J2OCrxEuvCjm88l9I"></script>

         

         <script type="text/javascript">
         
         (function() {
                "use strict";
                // Set our map options
                var address = "{{$ad->address}}, {{$ad->city}}, {{$ad->state}}, {{$ad->zip_code}}";
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
                            content: "{{{$ad->venue}}} : {{ $ad->venue_type}} "
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
        @if(Auth::id() == $ad->user_id)
        <div class="row" id="attend">
            <div class="col-md-7"></div>
                <div class="col-md-5">
                
                <h3 id="upevents">Requests to Attend</h3>
                <div>
                <table class='table table-bordered'>
                	<tr>
                		<th>Musician/Band</th>
                		<th>Instrument</th>
                		<th>Approve</th>
                		<th>Deny</th>
                	</tr>
                @foreach($requests as $request)
                    <tr id="req{{$request->user->id}}">
                    	<td>
                    		@if($request->user->user_type == 'Musician')
				                {{ $request->user->first_name }} {{ $request->user->last_name }}
				            @elseif($request->user->user_type == 'Band')
				                {{ $request->user->band_name }}
				            @endif
                    	</td>
                    	<td>{{ $request->user->instrument}}</td>
                    	<td>
							{{ Form::open(array('action' => array('AdsController@registerUser', $request->user_id, $request->ad_id))) }}
				                <input type="submit" name="submit" class="btn btn-success" value="Approve" />
				            {{ Form::close()}}
						</td>
						<td>
				            {{ Form::open(array('action' => array('RequestsController@destroy', $request->id), 'method' => 'DELETE')) }}
				            	<input type="text" style="display:none" name="ad_id" class = "form-control" id="ad_id" value="{{ $request->ad_id }}" >
				                <input type="submit" name="submit" class="btn btn-danger" value="Deny" />
				            {{ Form::close()}}
				        </td>
                        <td style="display:none" id="reqId">{{$request->user_id}}</td>
                    </tr>
                @endforeach
            	</table>
            	<h3 id="upevents" style="padding-top: 1px;">Attending</h3>
                @if(!$ad->attendees()->count() == 0)
                	<table class='table table-bordered'>
                    	<tr>
                    		<th>Musician/Band</th>
                    		<th>Instrument</th>
                    		<th>Unregister</th>
                        </tr>
                    @foreach($ad->attendees as $dee)
                        <tr>
                        	<td>
                        		@if($dee->user_type == 'Musician')
    				                {{ $dee->first_name }} {{ $dee->last_name }}
    				            @elseif($dee->user_type == 'Band')
    				                {{ $dee->band_name }}
    				            @endif
                        	</td>
                        	<td>{{ $dee->instrument}}</td>
                        	<td>
    							{{ Form::open(array('action' => array('AdsController@unregisterUser', $dee->id, $ad->id), 'method' => 'DELETE')) }}
    				                <input type="submit" name="submit" class="btn btn-warning" value="Unregister" />
    				            {{ Form::close()}}
    						</td>
                            <td id="hideReq" style="display:none">{{ $dee->id }}</td> 
                        </tr>
                    @endforeach
                	</table>
                @else
                    <p>This event has no attendees currently.</p>
                @endif

                </div>
            </div>
        </div>
        @endif
    </div>
<p style="display:none" id="userId">{{Auth::id()}}</p> 

<script type="text/javascript">
$(document).ready(function () {

var userId = document.getElementById("userId").innerText;
var register = document.getElementById("interest");
var el = document.getElementById("reqId").innerText;
var nogo = document.getElementById("nogo");
var pending = document.getElementById("pending");
var hideReq = document.getElementById("hideReq").innerText;
var hideRow = document.getElementById("req" + hideReq);
var attend = document.getElementById("attend");
var idme = document.getElementById("idme").innerText;

if (el == hideReq){
    pending.style.display = "none";
    nogo.style.display = "";
    hideRow.style.display = "none";
    register.style.display = "none";
} else if (el == userId) {
    register.style.display = "none";
    pending.style.display = "";
}



});


</script>

@stop