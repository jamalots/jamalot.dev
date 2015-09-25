@extends('layouts.master')


<style>
body
{
    font-family: 'Open Sans', sans-serif;
}

#prof
{
	position:fixed;
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
</style>
@section('content')


<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="fb-profile" id="prof">
       <img  align="left" class="fb-image-lg" src="{{ $user->cover_img }}" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{ $user->img }}" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><strong>{{ $user->first_name }} {{$user->last_name}}</strong></h1>
            <p><strong>location</strong> || {{ $user->location }} </p>
            <p><strong>main instrument</strong> || {{ $user->instrument }} </p>
            <p><strong>industry role</strong> || {{ $user->industry_role }} </p>
        </div>
    </div>
</div> <!-- /container -->  
<div class="row">

	<div class="col-md-4 col-xs-6"></div>
		<div class="col-md-8 col-xs-12">
			{{ $user->music }}
		</div>
	
</div>




@stop