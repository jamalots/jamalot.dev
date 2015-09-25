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







