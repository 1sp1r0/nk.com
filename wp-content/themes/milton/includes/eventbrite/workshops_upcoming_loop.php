<?php
	// args
	$args = array(
		'numberposts' => -1,
		'post_type' => 'workshops',
		'meta_key' => 'upcoming',
		'meta_value' => '1',

	);
	
	// get results
	$the_query = new WP_Query( $args );
	
	// The Loop
	if( $the_query->have_posts() ): 
?>
<section id="upcoming_workshops" class="workshops_list">
		
		<div class="wrapper">
		
			<h3>Upcoming Workshops</h3>
				<ul>
	
<?php   
	while ( $the_query->have_posts() ) : $the_query->the_post();
	
	if( get_field('event_leader') == true){
		$staff = true;
	}else{
		$staff = false;
	}
	$eventID = get_field('eventbrite_event_id');
	
	include('eb_leader_info.php');
	include('eb_event_api_call.php');
	include('eb_workshops_landing_output.php');
	endwhile; 
?>

</ul>
</div>
</section>

<?php 
	endif;
	wp_reset_query();  // Restore global post data stomped by the_post(). 
?>