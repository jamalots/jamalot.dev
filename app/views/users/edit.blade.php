@extends('layouts.master')

@section('styles')
<style type="text/css">
/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

html {
  height: 100%;
  /*Image only BG fallback*/
  background: black;
  /*background = gradient + image pattern combo*/
  /*background: 
    linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
    url('http://thecodeplayer.com/uploads/media/gs.png');*/
}

body {
  font-family: montserrat, arial, verdana;
  background-color: black; 
}
/*form styles*/
#msform {
  width: 400px;
  margin: 50px auto;
  text-align: center;
  position: relative;
}
#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;
  
  box-sizing: border-box;
  width: 80%;
  margin: 0 10%;
  
  /*stacking fieldsets above each other*/
  position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
  display: none;
}
/*inputs*/
#msform input, #msform textarea {
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #2C3E50;
  font-size: 13px;
}
/*buttons*/
#msform .action-button {
  width: 100px;
  background: #27AE60;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 1px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
  font-size: 15px;
  text-transform: uppercase;
  color: #2C3E50;
  margin-bottom: 10px;
}
.fs-subtitle {
  font-weight: normal;
  font-size: 13px;
  color: #666;
  margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: white;
  text-transform: uppercase;
  font-size: 9px;
  width: 33.33%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: white;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #27AE60;
  color: white;
}

</style>

@stop
@section('content')

<!-- multistep form -->
{{ Form::open(array('action' => array('UsersController@update', Auth::id()), 'files'=>true, 'id' => 'msform', 'method' => 'PUT')) }}
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Basic Information</li>
    <li>Style of Play</li>
    <li>Upload your Stuff</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Basic Information</h2>
    <h3 class="fs-subtitle">Announce thyself to the world!</h3>
    <label for="first_name">First Name: </label>
    <input type="text" name="first_name" class = "form-control" id="first_name" value=" {{$user->first_name}} ">
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" class = "form-control" id="last_name" value=" {{$user->last_name}} ">
    <label for="user_type">Type of Artist:</label>
    <select id="user_type" class="selectpicker form-control" data-live-search="true" name="user_type">
        <option {{{ $user->user_type == 'Musician' ? 'selected' : '' }}}>Musician</option>
        <option {{{ $user->user_type == 'Band' ? 'selected' : '' }}}>Band</option>
    </select>
        
        {{ Form::label('location', 'Location:') }}
        {{ Form::select('location', Config::get('states'), $user->location, array('class' => 'selectpicker form-control', 'data-live-search' => 'true')) }}

        <label for="about">About:</label>
        <textarea name="about" id="about" value=" {{$user->about}} ">{{$user->about}}</textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Style of Play</h2>
    <h3 class="fs-subtitle">Tell us how thee jams</h3>
    <label for="instrument">Instruments Played (Select Up to 3):</label>

    <select id="basic" class="selectpicker form-control" multiple data-max-options="3" data-live-search="true" name="instrument">
        @foreach(Config::get('instruments') as $instrumentType => $instrumentSubset)
            <optgroup label="{{{ $instrumentType }}}">
                @foreach($instrumentSubset as $instrumentName)
                    <option {{{ in_array($instrumentName, $user->instrument_array) ? 'selected' : '' }}}>{{{ $instrumentName }}}</option>
                @endforeach
            </optgroup>
        @endforeach
      </select>

    
    <label for="original">Playing Level:</label>
      <select id="level" class="selectpicker form-control" data-live-search="true" name="level">
          
          <option {{{ $user->level == 'Beginner' ? 'selected' : '' }}}>Beginner</option>
          <option {{{ $user->level == 'Intermediate' ? 'selected' : '' }}}>Intermediate</option>
          <option {{{ $user->level == 'Semi-Pro' ? 'selected' : '' }}}>Semi-Pro</option>
          <option {{{ $user->level == 'Professional' ? 'selected' : '' }}}>Professional</option>
      </select>
     
      <label for="original">Song Preference:</label>
      <select id="original" class="selectpicker form-control" data-live-search="true" name="original">
          
          <option {{{ $user->original == 'Originals' ? 'selected' : '' }}}>Originals</option>
          <option {{{ $user->original == 'Covers' ? 'selected' : '' }}}>Covers</option>
          <option {{{ $user->original == 'Both' ? 'selected' : '' }}}>Both</option>
          
      </select>

      
      <label for="genre">Genre (Select up to 5):</label>

      <select id="basic" class="selectpicker form-control" multiple data-max-options="5" data-live-search="true" name="genre">
        @foreach(Config::get('genres') as $genreType => $genreSubset)
            <optgroup label="{{{ $genreType }}}">
                @foreach($genreSubset as $genreName)
                    <option {{{ in_array($genreName, $user->genre_array) ? 'selected' : '' }}}>{{{ $genreName }}}</option>
                @endforeach
            </optgroup>
        @endforeach
        
      </select>
      <div class="checkbox checkbox-success">
        <input type="checkbox" id="teacher" checked="" name="teacher" value=" {{$user->teacher}} ">
        <label for="teacher"> Do You Offer Lessons? </label>
      </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Upload your stuff</h2>
    <h3 class="fs-subtitle">Share your mug and your tunes</h3>
    <label for="img">Upload Profile Image:</label>
    <input type="file" class="filestyle" name="img" data-buttonName="btn-success" data-input="false" value=" {{$user->img}} ">
    <label for="cover_img">Upload Cover Photo Image:</label>
    <input type="file" class="filestyle" data-input="false" name="cover_img" data-buttonName="btn-success" value=" {{$user->cover_img}} ">
    <label for="music">Pasta in your SoundCloud embedded link </label>
    <input type="text" name="music" class = "form-control" id="music" value=" {{{ $user->music }}} ">
    <br>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
    {{-- <button class="btn btn-primary submit action-button">Update Profile!</button> --}}
  </fieldset>
{{ Form::close()}}


<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script>
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

// $(".submit").click(function(){
//  return false;
// })


$(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
});

$('.selectpicker').selectpicker();

$(":file").filestyle({buttonName: "btn-success", input: "false"});



</script>

@stop

@foreach(Config::get('users') as $users)
  <option value="{{ $users['field'] }}"
    {{ (isset($user->type) && $user->type == $users['field']) ? 'selected' : '' }}>
    {{ $users['title'] }}
  </option>
@endforeach