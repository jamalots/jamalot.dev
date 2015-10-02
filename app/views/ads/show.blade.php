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
       <img  width="1129.500" height="372" align="left" class="fb-image-lg" src="{{'/img/castle.jpg' }}" alt="Profile image example"/>
        <img width="relative" height="185" align="left" class="fb-image-profile thumbnail" src="{{ $ad->ad_img or '/img/castle2.jpg' }}" alt="Profile image example"/>
        <div class="fb-profile-text">
        	@if($ad->ad_type == 'Informal Jam' || $ad->ad_type == 'Formal Jam/Practice/Rehearsal' || $ad->ad_type == 'Payed Gig')
            <h2><strong>Wanted: {{ $ad->ad_need }} for a {{ $ad->ad_type }} on {{ date('n/d/Y ', strtotime($ad->date)) }} </strong></h2>
            @elseif($ad->ad_type == 'Offering Lessons')
                <h2><strong>Offering Lessons: {{ $ad->user->instrument }}</strong></h2> 
            @elseif($ad->ad_type == 'Wanting Lessons')
                <h2><strong>Lessons/Teacher Desired: {{ $ad->user->instrument }}</strong></h2> 
            @endif
            <p><strong>type</strong> || {{ $ad->genre }} </p>
            
            {{-- <p><strong>Instruments</strong> || {{ $user->instrument }} </p>
            <p><strong>Genre</strong> || {{ $user->genre }} </p> --}}
        </div>
    </div>
</div> <!-- /container -->  


<script type="text/javascript">
$(":file").filestyle({buttonName: "btn-primary", buttonBefore: true, });
</script>


@stop