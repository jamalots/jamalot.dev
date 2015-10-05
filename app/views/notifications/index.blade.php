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

</style>
@section('content')

<div class="jumbotron">
	<div class="page-header">
		<h1>Notifications <span class="glyphicon glyphicon-cd" aria-hidden="true"></span></h1>
	</div>

</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
		@include('notifications.partials.notifications')

	</div>
</div>

@stop