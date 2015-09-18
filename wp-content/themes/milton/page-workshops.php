<?php

get_header(); 
?>

<!--	<h2 class="page_title">Workshops</h2> -->
	
	<section id="workshops_intro" style="background-image: url(<?php echo get_field('intro_bg_image'); ?>);">
		
		<div class="wrapper">
		
			<?php the_field('page_intro_text'); ?>
			
			<span class="arrow">&darr;</span>
		
		</div>
		
	</section>
	
	<section id="workshops_overview">
		
		<div class="wrapper">
			
			<?php the_field('page_content_text'); ?>
			
		</div>
		
	</section>
	
	
			
	<?php include('includes/eventbrite/workshops_upcoming_loop.php'); ?>
			
		

	<?php include('includes/eventbrite/workshops_past_loop.php'); ?>

	<?php /*<section id="other_workshops" class="workshops_list">

		<div class="wrapper">

			<h3>Other Offerings</h3>

			<p>We'll host a customized 2-hour workshop for your team on the following topics:</p>

			<ul>
				<li>Storytelling</li>
				<li>Design Thinking</li>
				<li>Branding</li>
				<li>Activating Story for Social Change</li>
				<li>Creativity for adults</li>
			</ul>

			<p>Interested? Email us at <a href="mailto:hello@newkind.com">hello@newkind.com</a></p>

		</div>

	</section> */?>


	<div class="wrapper">

		<div class="custom-workshop">

			<h3><?php the_field('custom_workshop_promo_header'); ?></h3>

			<p><?php the_field('custom_workshop_promo_text'); ?></p> 

	   		<p class="not-scheduled-email">Contact us at <a href="mailto: hello@newkind.com">hello@newkind.com</a></p>

		</div><!--.custom-workshop-->

	</div>


	
	<?php if(get_field('quote_text')) : ?>
	
	<section id="workshop_quote">
		
		<div class="wrapper">
			
			<img src="<?php the_field('quote_headshot'); ?>" />
		
			<blockquote>&ldquo;<?php the_field('quote_text'); ?>&rdquo; 
				<dl class="attribution">
					<dt><?php the_field('quote_name'); ?></dt>
					<dd><?php the_field('quote_title'); ?></dd>
				</dl>
			</blockquote>

		</div>
		
	</section>

	
	
	<?php endif; ?>
		
		
	
<?php 
//include('includes/loop_page.php');
//include('includes/eventbrite_api.php'); 
?>

<?php


get_footer();


?>