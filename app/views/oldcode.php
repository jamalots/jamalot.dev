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







