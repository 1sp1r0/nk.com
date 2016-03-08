<?php /* THIS IS THE TAKEOVER PROTOTYPE */ ?>

<?php get_header(); ?>

	<section class="blogs">
		<h2>
			<span class="wrapper"> 

				<?php /* If this is a category archive */ if (is_category()) { ?>
					Category: <?php single_cat_title(); ?>
 	  			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					Tag: <?php single_tag_title(); ?>
 	  			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					Date: <?php the_date(); ?>
				<?php } ?>
			
			</span>
		</h2>
		<ul id="infinite-scroll-content">

		<?php 
			
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<?php get_template_part( 'content', get_post_format() ); ?>
					
		<?php endwhile; endif; ?>
		</ul>
	</section>

	<div class="blog-nav">
		<?php posts_nav_link(' - ','Newer Posts','Older Posts'); ?>
	</div>
	
	
<?php get_footer(); ?>