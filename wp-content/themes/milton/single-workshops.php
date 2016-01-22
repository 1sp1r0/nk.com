<?php get_header(); ?>

	<section id="workshop_title" style="background-image: url('<?php the_field('workshop_header_bg'); ?>');">
		<h2><?php the_title(); ?></h2>
		<hr />
		<h3>About this workshop</h3>
		<span class="arrow">&darr;</span>
	</section>
	
	<section id="workshop_about" class="wrapper">

		
		<div id="workshop_tagline" style="background-image: url('<?php the_field('workshop_tagline_bg'); ?>');">
			<h4><?php the_field('workshop_tagline'); ?></h4>
		</div>

		<?php if( esc_html( get_field('workshop_description' )) != null ){
			echo '<div id="workshop_summary">';
			esc_html( the_field( 'workshop_description' ));
			echo '</div>';
		}?>
		
		
		
		<?php 
		   	$takeaways = get_field('workshop_takeaways');

		   	if($takeaways != null){

		   		echo '<div id="workshop_takeaways"><h5>Workshop Takeaways</h5><dl>';

		   		foreach($takeaways as $item){
		   			echo '<dt>'.$item["takeaway_header"].'</dt>';
		   			echo '<dd>'.$item["takeaway_text"].'</dd>';
		   		}

		   		echo '</dl></div>';
		   	}
		   ?>



		   	<?php

		   	if(get_field('event_leader') == true){
				
				$staff = get_field('nk_staff');
				$userID = $staff['ID'];
				$name = get_the_author_meta('display_name',$userID);
				$title = get_the_author_meta('job_title',$userID);
				$description = get_the_author_meta('description',$userID);
				$headshot = get_avatar_url( $userID);
				$organization = "New Kind";
				
				
		
			}else{
				$name = get_field('leader_name');
				$title = get_field('leader_title');
				$organization = get_field('leader_organization');
				$description = get_field('leader_bio');
				$headshot = get_field('leader_headshot');

			}

		   	if(get_field('upcoming') == true ) : ?>


		   	<div id="workshop_details">
		   	
		 
			<h5>Workshop</h5>
			<h4><?php the_title(); ?></h4>

			<?php 

			

			if( get_field('not_scheduled') == false ){

				$eventID = get_field('eventbrite_event_id');
				include('includes/eventbrite/eb_event_api_call.php');
				$date = gmdate('D / M j', strtotime($event->start->local));
				$startTime = gmdate('g:i', strtotime($event->start->local));
				$endTime = gmdate('g:ia', strtotime($event->end->local));
				$link = $event->url;
				$streetAddr = $event->venue->address->address_1;
				$city = $event->venue->address->city;
				$state = $event->venue->address->region;
				$zip = $event->venue->address->postal_code;
				
			
			}

			?>

			<img class="small_headshot" src="<?php echo $headshot; ?>" />
			<p class="name"><?php echo $name; ?></p>
			<p class="title"><?php echo $title; ?>, <?php echo $organization; ?></p>

			<p class="date border"><?php echo $date; ?> <span class="time"><?php echo $startTime; ?> - <?php echo $endTime; ?></span></p>
				
				

				<?php foreach($event->ticket_classes as $ticketType){

					

					$ticketsRemaining = $ticketType->quantity_total - $ticketType->quantity_sold;

					$ticketsRemain = true; //this is just a flag variable to tell if the event is sold out

					if( $ticketsRemaining != 0 ){

						$ticketPrice = (( $ticketType->cost->value + $ticketType->fee->value) / 100 );
						if( $ticketPrice == 0 ){ 
							$ticketPrice = 'Free'; 
						}else{
							$ticketPrice = '$'.$ticketPrice;
						}

						$tickets = $tickets.'<span>'.$ticketType->name.' - '.$ticketPrice.'</span>';


						if( $event->show_remaining == true ){

							$tickets .= '<span class="availability">'.( $ticketType->quantity_total - $ticketType->quantity_sold ).' Available</span>';	

						}

						
					
						

					}else{
						$ticketsRemain = false;
					}

				} 

				echo '<p class="tickets border">'.$tickets.'</p>';

				?>

				<div class="border attend">
					<?php 
					if($ticketsRemain === false){ 
						echo '<a href="'.$link.'" class="large button disabled">Sold Out</a>'; 
					}else{
						echo '<a href="'.$link.'" class="large button">Attend</a>';
					} 
					?>
				</div>
				<p class="address border"><?php echo $streetAddr; ?>, <?php echo $city.', '.$state.' '.$zip; ?></p>
			</div><!--.workshop-details-->
			<?php 

			else : ?>
			
			<div class="not-scheduled">
				<h3><?php the_field('not_scheduled_promo_header'); ?></h3>
				<p><?php the_field('not_scheduled_promo_text'); ?></p>
				<p class="not-scheduled-email">Contact us at <a href="mailto:hello@newkind.com">hello@newkind.com</a></p>
			</div><!--.not-scheduled-->

		<? endif; ?>
		
	</section>
	
	<section id="workshop_info" class="wrapper">

		<?php if( get_field('testimonials') != null ) : ?>
		
		<div id="workshop_testimonials">

			<h5>What attendees have said</h5>

			<?php 
				$quotes = get_field('testimonials'); 

				foreach( $quotes as $quote ){
					echo '<div class="quote" style="background-image: url('.$quote['workshop_attendee_headshot'].');">';
					echo '<p class="quote-text">'.$quote['workshop_testimonial'].'<span class="quote-name">'.$quote['workshop_attendee_name'].'<span class="title"> - '.$quote['workshop_attendee_title'].',</span> <span class="organization">'.$quote['workshop_attendee_organization'].'</span></p>';
					echo '</div>';
				}
			?>
		
	   </div><!--#workshop_testimonials-->

	<?php endif; ?>
		
		<div id="leader_info">

			<h5>About Your Guide</h5>
			
			<div id="leader_info_header">
				<img class="left" src="<?php echo $headshot; ?>" />
				<h4>
					<dl>
						<dt><?php echo $name; ?></dt>
						<dd><?php echo $title; ?></dd>
					</dl>
				</h4>
			</div>
			
			<p id="leader_description"><?php echo $description; ?></p>

		</div>
		
	</section>
	
	<!--<section id="upcoming_workshops" class="wrapper">
		
		<h3>Upcoming Workshops</h4>
		
		<div class="workshop">
			<h4 style="background:url(<?php echo get_template_directory_uri(); ?>/assets/images/workshops/building-brand-thumb.jpg) top center no-repeat;">Building a Brand from the inside out</h4>
			<p class="workshop_desc">Improve your effectiveness at positioning your company's brand.</p>
			<a href="'.get_the_permalink().'">Learn More &raquo;</a>
		</div>
		
	</section>-->
	
	
	
	
	
	

<?php get_footer(); ?>