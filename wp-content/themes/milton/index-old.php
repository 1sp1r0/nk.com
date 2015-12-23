<?php get_header(); //cachebreaker ?>

<section class="page_section">
	
	<h2 class="page_title dark">Blog</h2>
	
	<section class="page_wrapper dark">
	
		<div class="blog_list">
			<ul>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				    
				<li>
					<a href="<?php the_permalink(); ?>">
						<dl class="show">
							<dt><?php the_title(); ?></dt>
							<dd><?php echo get_the_excerpt(); ?></dd>
							<dd class="byline">Posted by <?php the_author(); ?> in <?php the_date('F, Y'); ?></dd>
						</dl>
					</a>
				</li>
				
				
					
				<?php endwhile; endif; ?>
				
			</ul>
			
		</div><!--.blog_list-->
	
	
		<div class="post_nav">
			<div class="prev_link"><?php previous_posts_link('&larr; Newer Posts'); ?></div> 
			<div class="next_link"><?php next_posts_link('Older Posts &rarr;'); ?></div>
		</div>
	</section>
	
</section>

<?php get_footer(); ?>