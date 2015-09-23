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