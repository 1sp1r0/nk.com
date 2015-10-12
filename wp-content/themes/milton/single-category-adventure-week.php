<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="takeover-content wrapper">

		<section class="takeover-content-left">

			
			<?php get_template_part('content-expanded'); ?>

		</section>

		<section class="takeover-content-right">

			<?php get_template_part('content-intro-post'); ?>
			<?php get_template_part('content-adventure-guide'); ?>

		</section>
		
	</section>

	<div class="post_nav wrapper" role="navigation">
		<div class="prev_link"><?php previous_post_link('%link','&larr; Previous Post'); ?></div> 
		<div class="next_link"><?php next_post_link('%link','Next Post &rarr;'); ?></div>
	</div>



	<section class="takeover-content-bottom">

		<?php get_template_part('content-about-adventure-week'); ?>

		<?php get_template_part('content-newsletter-signup'); ?>

	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>