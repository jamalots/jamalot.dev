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
{{ Form::open(array('action' => array('EventsController@store'), 'files'=>true, 'id' => 'msform')) }}
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Create an Event</li>
    <li>Event Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create an Event</h2>
    <h3 class="fs-subtitle">Post Your Shows and Gigs</h3>
    <label for="event_title">Title:</label>
    <input type="text" name="event_title" class = "form-control" id="event_title">
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>
    <label for="date">Date:</label>
    <input type="date" name="date" class = "form-control" id="date">
    <label for="start_time">Start Time:</label>
    <input type="time" name="start_time" class = "form-control" id="start_time">
    <label for="price">Cover:</label>
    <input type="number" name="price" class = "form-control" id="price">
    <label for="img">Upload Event Image:</label>
    <input type="file" class="filestyle" name="img" data-buttonName="btn-success" data-input="false">
    <label for="cover_img">Upload Event Cover Image:</label>
    <input type="file" class="filestyle" name="cover_img" data-buttonName="btn-success" data-input="false">

    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Location Details</h2>
    <h3 class="fs-subtitle">Where it all goes down</h3>
    <label for="venue">Venue:</label>
    <input type="text" name="venue" class = "form-control" id="venue">
    <label for="venue_site">Venue Website (optional):</label>
    <input type="url" name="venue_site" class = "form-control" id="venue_site">
    <label for="address">Address:</label>
    <input type="text" name="address" class = "form-control" id="address">
    <label for="city">City:</label>
    <input type="text" name="city" class = "form-control" id="city">
    <label for="state">State:</label>
    <select id="state" class="selectpicker form-control" data-live-search="true" name="state">
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
    <label for="zip_code">Zip Code:</label>
    <input type="text" name="zip_code" class = "form-control" id="zip_code">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
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