<div class="blog-post" data-id="<?php the_ID(); ?>">
				
	<h3 class="blog-title"><?php the_title(); ?></h3>
	

	<?php if( get_field('repost') == true ) : ?>
		<p class="editors-note"><em>Originally posted in the <?php echo get_field('original_post_season'); ?> of <?php echo get_field('original_post_year'); ?>.</em></p>
	<?php endif; ?>

	<?php 
	get_template_part( 'content-guide-note' ); ?>

	<div class="author-bio">
		<a href="<?php the_author_meta('user_url'); ?>">

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/<?php the_author_meta('nickname'); ?>.jpg" />
			<h4><?php the_author_meta('display_name'); ?></h4>
			<p><?php the_author_meta('job_title'); ?></p>
			<p class="bio-text">Bio &rarr;</p>
		</a>
	</div>




	<?php 
	the_content(); ?>

</div>
