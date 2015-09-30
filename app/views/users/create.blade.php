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
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" class = "form-control" id="first_name">
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" class = "form-control" id="last_name">
    <label for="user_type">Type of Artist:</label>
    <select id="user_type" class="selectpicker form-control" data-live-search="true" name="user_type">
          <option>Musician</option>
          <option>Band</option>
        </select>
        <label for="location">Location:</label>
        <select id="location" class="selectpicker form-control" data-live-search="true" name="location">
            <option>Alaska</option>
            <option>Alabama</option>
            <option>Arkansas</option>
            <option>Arizona</option>
            <option>California</option>
            <option>Colorado</option>
            <option>Connecticut</option>
            <option>District of Columbia</option>
            <option>Delaware</option>
            <option>Florida</option>
            <option>Georgia</option>
            <option>Hawaii</option>
            <option>Iowa</option>
            <option>Idaho</option>
            <option>Illinois</option>
            <option>Indiana</option>
            <option>Kansas</option>
            <option>Kentucky</option>
            <option>Louisiana</option>
            <option>Massachusetts</option>
            <option>Maryland</option>
            <option>Maine</option>
            <option>Michigan</option>
            <option>Minnesota</option>
            <option>Missouri</option>
            <option>Mississippi</option>
            <option>Montana</option>
            <option>North Carolina</option>
            <option>North Dakota</option>
            <option>Nebraska</option>
            <option>New Hampshire</option>
            <option>New Jersey</option>
            <option>New Mexico</option>
            <option>Nevada</option>
            <option>New York</option>
            <option>Ohio</option>
            <option>Oklahoma</option>
            <option>Oregon</option>
            <option>Pennsylvania</option>
            <option>Puerto Rico</option>
            <option>Rhode Island</option>
            <option>South Carolina</option>
            <option>South Dakota</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Utah</option>
            <option>Virginia</option>
            <option>Vermont</option>
            <option>Washington</option>
            <option>Wisconsin</option>
            <option>West Virginia</option>
            <option>Wyoming</option>
        </select>
        <label for="about">About:</label>
        <textarea name="about" id="about"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Style of Play</h2>
    <h3 class="fs-subtitle">Tell us how thee jams</h3>
    <label for="instrument">Instruments Played (Select Up to 3):</label>
        <select id="basic" class="selectpicker form-control" multiple data-max-options="3" data-live-search="true" name="instrument">
            <optgroup label="Guitar">
              <option>Acoustic Guitar</option>
              <option>Classical Guitar</option>
              <option>Electric Guitar</option>
              <option>Steel Guitar</option>
              <option>Electric Bass</option>
              <option>Double Bass</option>
              <option>Ukelele</option>
            </optgroup>
            <optgroup label="Keys">
              <option>Piano</option>
              <option>Keyboard</option>
              <option>Organ</option>
              <option>Accordion</option>
            </optgroup>
            <optgroup label="Percussion">
              <option>Drums</option>
              <option>Other Percussion</option>
            </optgroup>
            <optgroup label="Vocals">
              <option>Lead Rock/Pop</option>
              <option>Lead Jazz</option>
              <option>Bass</option>
              <option>Baritone</option>
              <option>Tenor</option>
              <option>Alto</option>
              <option>Mezzo-Soprano</option>
              <option>Soprano</option>
            </optgroup>
            <optgroup label="Strings">
              <option>Cello</option>
              <option>Double Bass</option>
              <option>Viola</option>
              <option>Violin</option>
              <option>Fiddle</option>
              <option>Banjo</option>
              <option>Harp</option>
              <option>Mandolin</option>
            </optgroup>
            <optgroup label="Brass">
              <option>Trumpet</option>
              <option>Trombone</option>
              <option>Tuba</option>
              <option>French Horn</option>
            </optgroup>
            <optgroup label="Winds">
              <option>Alto Sax</option>
              <option>Tenor Sax</option>
              <option>Flute</option>
              <option>Oboe</option>
              <option>Clarinet</option>
              <option>Harmonica</option>
              <option>Piccolo</option>
              <option>Bassoon</option>
            </optgroup>
        </select>
        <label for="level">Playing Level:</label>
        <select id="location" class="selectpicker form-control" data-live-search="true" name="level">
            <option>Beginner</option>
            <option>Intermediate</option>
            <option>Semi-Pro</option>
            <option>Professional</option>
        </select>
        <label for="original">Song Preference:</label>
        <select id="original" class="selectpicker form-control" data-live-search="true" name="original">
            <option>Originals</option>
            <option>Covers</option>
            <option>Both</option>
        </select>
        <label for="genre">Genre (Select up to 5):</label>
        <select id="basic" class="selectpicker form-control" multiple data-max-options="5" data-live-search="true" name="genre">
            <optgroup label="Blues">
              <option>Acoustic Blues</option>
              <option>Electric Blues</option>
            </optgroup>
            <optgroup label="Bluegrass">
              <option>Bluegrass</option>
            </optgroup>
            <optgroup label="Classical">
              <option>Classical</option>
            </optgroup>
            <optgroup label="Country">
              <option>Pop Country</option>
              <option>Traditional Country</option>
            </optgroup>
            <optgroup label="Electronic">
              <option>House</option>
              <option>Deep House</option>
              <option>Dubstep</option>
              <option>Trap</option>
              <option>Techno</option>
              <option>Downtempo</option>
              <option>Ambient</option>
              <option>Drums & Bass</option>
              <option>Video Game</option>
            </optgroup>
            <optgroup label="Folk">
              <option>Americana</option>
              <option>Acoustic Folk</option>
              <option>Cajun Folk</option>
              <option>Celtic Folk</option>
              <option>Singer/Songwriter Folk</option>
            </optgroup>
            <optgroup label="Jazz">
              <option>Combo Jazz</option>
              <option>Dixieland Jazz</option>
              <option>Ensemble Jazz</option>
              <option>Fusion Jazz</option>
              <option>Latin Jazz</option>
              <option>Standards</option>
              <option>Acid Jazz</option>
            </optgroup>
            <optgroup label="Latin">
              <option>Latin</option>
            </optgroup>
            <optgroup label="New Age">
              <option>New Age</option>
            </optgroup>
            <optgroup label="Rock/Pop">
              <option>Ambient</option>
              <option>Christian</option>
              <option>Classic Rock</option>
              <option>Dance</option>
              <option>Hard Rock</option>
              <option>Heavy Metal</option>
              <option>Indie Rock</option>
              <option>Latin Rock</option>
              <option>New Wave</option>
              <option>Pop</option>
              <option>Psychedelic</option>
              <option>Punk Rock</option>
              <option>Rock & Roll</option>
              <option>Rockabilly</option>
              <option>Singer/Songwriter</option>
              <option>Ska</option>
              <option>Soft Rock</option>
              <option>Southern Rock</option>
              <option>Top 40</option>
            </optgroup>
            <optgroup label="Hip Hop/Rap">
              <option>Hip Hop/Rap</option>
            </optgroup>
            <optgroup label="R&B/Soul">
              <option>Classic Soul</option>
              <option>Neo-Soul</option>
              <option>Gospel</option>
              <option>Contemporary R&B</option>
            </optgroup>
            <optgroup label="Reggae">
              <option>Reggae</option>
            </optgroup>
            <optgroup label="Soundtrack">
              <option>Soundtrack</option>
            </optgroup>
            <optgroup label="World Music">
              <option>World Music</option>
            </optgroup>
        </select>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Upload your stuff</h2>
    <h3 class="fs-subtitle">Share your mug and your tunes</h3>
    <label for="img">Upload Profile Image:</label>
    <input type="file" class="filestyle" name="img" data-buttonName="btn-success" data-input="false">
    <label for="cover_img">Upload Cover Photo Image:</label>
    <input type="file" class="filestyle" data-input="false" name="cover_img" data-buttonName="btn-success">
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