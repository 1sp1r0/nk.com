<?php get_header(); ?>

<div class="wrapper">
	
		<?php
			if (have_posts()) : while (have_posts()) : the_post();
		?>

<h2 class="page_title"><?php echo get_the_title(); ?></h2>

<p class="page_summary"><?php echo get_the_content(); ?></p>

<img src="<?php the_field('image'); ?>" />

<section class="contact_info one_third left whitney_book">
	<h3>Contact Info</h3>

	<dl>
		<dt>email</dt>
		<dd><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></dd>
		<dt>phone</dt>
		<dd><?php the_field('phone'); ?></dd>
		<?php
			//a loop for the non-required fields to ensure no output of blank info
			
			$info = array(
				'skype',
				'twitter',
				'linkedin'
				);
		
			foreach($info as $contact){
			
				$username = get_field($contact);
				
				switch ($contact){
					case('skype'):
						$link = 'skype:'.$username.'?add';
						break;
					case('twitter'):
						$link = 'http://www.twitter.com/'.$username;
						break;
					case('linkedin'):
						$link = 'http://www.linkedin.com/in/'.$username;
						break;
						
				}
				if($username != null){
					echo '<dt>'.$contact.'</dt>';
					echo '<dd><a href="'.$link.'">'.$username.'</a></dd>';
				}
			}
		?>
	</dl>
</section>

<section class="bio two_thirds right chronicle">
	
	<iframe width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=New%20Kind%2C%20Brooks%20Avenue%2C%20Raleigh%2C%20NC%2C%20United%20States&amp;key=AIzaSyCBRK7gicHHIFAAsE_eQFTOxaWNEP2kF7w">&lt;br /&gt;
	</iframe>
	
</section>

<?php	
	endwhile;
	endif;
?>

</div>

<?php get_footer(); ?>