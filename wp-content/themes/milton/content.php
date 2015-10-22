


	<a href="<?php the_permalink(); ?>">
		<li class="blog-post">
			<div class="wrapper">
			
			<h3><?php the_title(); ?></h3>
			<p class="byline">Posted by <?php the_author(); ?> on <?php echo get_the_date('F d, Y'); ?></p>
			<p><?php echo get_the_excerpt(); ?></p>

		</div>

	
	
	
</li></a>