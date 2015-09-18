<?php get_header(); ?>

<div class="wrapper">

		<?php
			print_r(get_users());
		?>
	
	<div class="cards portrait">
		
		<ul>
			
			<?php 
			// THIS LOOP IS FOR DEMO PURPOSES ONLY - NEEDS TO BE REMOVED ONCE CONTENT IS IN!!! 
			for($i=0;$i<5;$i++):
			
			?>
			<?php
				
				
				$args = array( 'post_type' => 'team');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				
			?>
			
				<li style="background-image: url('<?php the_field('headshot_thumbnail'); ?>');">
					<a href="<?php echo get_the_permalink(); ?>">
					<dl>
						<dt><?php the_field('first_name'); echo ' '; the_field('last_name'); ?></dt>
						<dd><?php the_field('job_title'); ?></dd>
					</dl>
					</a>
				</li>
			
			<?php endwhile; ?>
			
			<?php endfor; ?>
		</ul>
			
	</div><!--.cards.portrait-->

</div><!--.wrapper-->


<?php get_footer(); ?>