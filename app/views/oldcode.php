<div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-info btn-file">Browse 
                            {{ Form::file('img') }}
                            </span>
                        </span>
                        {{ Form::text('img', null, ['class' => 'form-control', 'readonly', 'name' => 'img']) }}
                    </div>





@if(!$currentUser)
            <li>{{ link_to_route('register_path','Sign Up',null,['class' => 'btn btn-lg btn-primary'])}}</li>
            @endif
            @if ($currentUser)



<!-- CODE TO DISPLAY GRID.  FUNCTIONAL -->

<div class="media">
	<?php 
	    $count = 0;
	    foreach ($users as $user)
	    { //foreach as shown in question

	        if($count==0){
	            echo '<div class="media-row">';
	        } elseif($count==0 OR is_int($count/4)){
	            echo '</div><div class="media-row">';
	        } ?>

	        <div class="thumbnail"><img src="{{ $user->img }}"/>
		      <div class="overlay">
		        <h2>{{ $user->user_name }}</h2>
		        <p>{{ $user->location }}</p><span class="zoom-btn"></span>
		      </div>
		    </div>

	        <?php 

	        $count++;
	    } //end foreach
	?>
</div>

<!-- END CODE TO DISPLAY GRID -->

<!-- JQUERY CODE TO RENDER IN DISPLAY WINDOW -->
var fullView = '<div class="media-view"> <div class="media-thump"><img src="'+ image +'"/></div> <div class="media-info"><h2>'+ title +'</h2><table class="table table-bordered table-hover"><tr><td>Location:</td><td>' + location + '</td></tr><tr><td>Instrument:</td><td>' + instrument + '</td></tr><tr><td>Playing Level:</td><td>' + level + '</td></tr><tr><td>Genre:</td><td>' + genre + '</td></tr><tr><td>About:</td><td>' + about + '</td></tr><tr><td><btn class="btn btn-primary">View Band Page</btn></td><td><btn class="btn btn-primary">Follow</btn></td></tr></table></div><span class="close">&times</span></div>';

<!-- END JQUERY CODE -->

<!-- BEGIN INITIAL TIMELINE WITHOUT LARAVEL -->

@extends('layouts.master')

<head>
  <link rel="stylesheet" href="css/timeliner-future.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/js/vendor/venobox/venobox.css" type="text/css" media="screen">
</head>

@section('content')

  <div class="container">
    <h1>Upcoming Events</h1>
    {{-- BEGIN TIMELINE WRAPPER --}}
    <div id="timeline" class="timeline-container">

      <button class="timeline-toggle">+ expand all</button>

      <br class="clear">

      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>20</span></h2>
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="robots" class="timeline-event"><a>Robots</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="robotsEX">
            <div class="media">
              <a href="http://youtu.be/hUnibKe_o18" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)"><img src="img/event-robots.jpg" alt="singing robots"></a>
              <p><a href="http://youtu.be/hUnibKe_o18" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)">Listen</a></p>
            </div><!-- /.media -->

            <blockquote>
              <p>The world is very different ever since the robotic uprising of the mid-nineties. There is no more unhappiness.</p>
              <p>Affirmative.</p>
              <p>We no longer say yes, instead we say affirmative.</p>
              <p>Yes, affirmative.</p>
              <p>Unless its a more colloquial situation with a few robo friends.</p>
              <p>There is only one type of dance, the robot.</p>
              <p>And the robo-boogie.</p>
              <p>Oh yes, two kinds of dances.</p>
            </blockquote>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->


        </dl><!-- /.timeline-series -->
      </div><!-- /.timeline-wrapper -->


      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>2062</span></h2>
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="cars" class="timeline-event"><a>Flying Cars</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="carsEX">
            <div class="media">
              <a href="http://youtu.be/FyinD6ZDqeg" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)"><img src="img/event-cars.jpg" alt="flying car"></a>
              <p><a href="http://youtu.be/FyinD6ZDqeg" class="venobox" data-type="youtube" data-overlay="rgba(0,0,0,0.5)">See it in Action</a></p>
            </div><!-- /.media -->

            <p>A flying car is hypothetical personal aircraft that provides door-to-door aerial transportation (e.g., from home to work or to the supermarket) as conveniently as a car but without the requirement for roads, runways or other specially-prepared operating areas.</p>
            <p>The flying car has been depicted in works of fantasy and science fiction such as The Jetsons, Star Wars, Blade Runner, Back to the Future Part II and The Fifth Element. The Jetsons took place in 2062.</p>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->

          <span class="tick tick-before"></span>
          <dt id="urbanity" class="timeline-event"><a>Aged Urbanity</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="urbanityEX">
            <div class="media">
              <a href="http://discovermagazine.com/2012/oct/2062-the-state-of-the-world" class="venobox" data-type="iframe" data-overlay="rgba(0,0,0,0.5)"><img src="img/event-urbanity.jpg" alt="jam packed city fuels tempers"></a>
              <p><a href="http://discovermagazine.com/2012/oct/2062-the-state-of-the-world" class="venobox" data-type="iframe" data-overlay="rgba(0,0,0,0.5)">read the predictions</a></p>
            </div><!-- /.media -->

            <p>From <i>Discover</i> magazine's "<a href="http://discovermagazine.com/2012/oct/2062-the-state-of-the-world" class="venobox" data-type="iframe">The State of the World: 2062</a>":</p>

            <blockquote>
              <p>6 billion people live in cities—the population of the entire world at the turn of the century.</p>
            </blockquote>
            <blockquote>
              <p>Earth now home to 2 billion people age 60 and over.</p>
            </blockquote>
            <blockquote>
              <p>Coastal cities go under. Renewable energy rules the day. Cows use up precious water and drive the ongoing greenhouse effect.</p>
            </blockquote>
            <blockquote>
              <p>Incomes skyrocket in developing nations.</p>
            </blockquote>
            <blockquote>
              <p> Ice caps melt. Industry booms at top of the world.</p>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->


        </dl><!-- /.timeline-series -->
      </div><!-- /.timeline-wrapper -->

      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>2265</span></h2>
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="teleport" class="timeline-event"><a>Teleportation</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="teleportEX">

            <div class="media">
              <a href="https://www.teliportme.com/view/446746" class="venobox" data-type="iframe" data-overlay="rgba(0,0,0,0.5)"><img src="img/event-teleportation.jpg" alt="teleporting humans"></a>
              <p><a href="https://www.teliportme.com/view/446746" class="venobox" data-type="iframe" data-overlay="rgba(0,0,0,0.5)">Try It Now</a></p>
            </div><!-- /.media -->

            <p>Teleportation, or Teletransportation, is the theoretical transfer of matter or energy from one point to another without traversing the physical space between them. It is a common subject of science fiction literature, film, and television.</p>

            <p>The original Star Trek series is <a href="http://scifi.stackexchange.com/questions/12784/what-year-is-star-trek-the-original-series-set-in" target="_blank">reported</a> to have taken place from 2265 to 2271.</p>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->
        </dl><!-- /.timeline-series -->

      </div><!-- /.timeline-wrapper -->

      <div class="timeline-wrapper">
        <h2 class="timeline-time"><span>2888</span></h2>
        <dl class="timeline-series">
          <span class="tick tick-before"></span>
          <dt id="singularity" class="timeline-event"><a>Singularity</a></dt>
          <span class="tick tick-after"></span>
          <dd class="timeline-event-content" id="singularityEX">

            <div class="media">
              <!-- <a href="img/event-singularity-woah.gif"></a> -->
              <img src="img/event-singularity.gif" alt="">
            </div><!-- /.media -->

            <p>The technological singularity hypothesis is that accelerating progress in technologies will cause a runaway effect wherein artificial intelligence will exceed human intellectual capacity and control, thus radically changing or even ending civilization in an event called the singularity.</p>

          <br class="clear">
          </dd><!-- /.timeline-event-content -->
        </dl>
      </div>

      <button class="timeline-toggle">+ expand all</button>

      <br class="clear">

    </div><!-- /#timeline -->

  </div><!-- /.container -->

  <!-- GLOBAL CORE SCRIPTS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/vendor/venobox/venobox.min.js"></script>
  <script type="text/javascript" src="/js/timeliner.js"></script>
  <script>
    $(document).ready(function() {
      $.timeliner({
        timelineContainer:'#timeline',
      });
      $('.venobox').venobox();
    });

  </script>

@stop

<option value="">N/A</option>
      <option value="AK">Alaska</option>
      <option value="AL">Alabama</option>
      <option value="AR">Arkansas</option>
      <option value="AZ">Arizona</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DC">District of Columbia</option>
      <option value="DE">Delaware</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="IA">Iowa</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="MA">Massachusetts</option>
      <option value="MD">Maryland</option>
      <option value="ME">Maine</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MO">Missouri</option>
      <option value="MS">Mississippi</option>
      <option value="MT">Montana</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="NE">Nebraska</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NV">Nevada</option>
      <option value="NY">New York</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="PR">Puerto Rico</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VA">Virginia</option>
      <option value="VT">Vermont</option>
      <option value="WA">Washington</option>
      <option value="WI">Wisconsin</option>
      <option value="WV">West Virginia</option>
      <option value="WY">Wyoming</option>


<html>
<head>
  <title></title>
<style type="text/css">
/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

html {
  height: 100%;
  /*Image only BG fallback*/
  background: url('http://thecodeplayer.com/uploads/media/gs.png');
  /*background = gradient + image pattern combo*/
  background: 
    linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
    url('http://thecodeplayer.com/uploads/media/gs.png');
}

body {
  font-family: montserrat, arial, verdana;
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
</head>
<body>

<!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>

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

$(".submit").click(function(){
  return false;
})
</script>
</body>
</html>


