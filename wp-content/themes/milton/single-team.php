<?php get_header(); ?>

<div class="wrapper" role="article">
	
	<h2 class="page_title"><?php echo get_the_title(); ?></h2>
	
		<p class="page_summary"><span><?php the_field('job_title'); ?></span></p>

		<img src="<?php the_field('headshot'); ?>" />

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
							$link = $username;
							$username = get_the_title();
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
		<h3>Biography</h3>
		
		<?php echo get_field('biography'); ?>
		
	</section>
		
</div>

<?php get_footer(); ?>