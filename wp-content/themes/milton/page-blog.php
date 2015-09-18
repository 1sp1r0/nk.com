<?php get_header(); ?>

<div class="wrapper">
	
	<h2 class="page_title">Blog</h2>
	
	<div class="cards">
		<ul>
			<?php
				query_posts( $posts );
				while ( have_posts() ) : the_post(); 
			?>
			    
			<li style="background-image: url('http://placehold.it/600x400');">
				<a href="<?php the_permalink(); ?>">
					<dl class="show">
						<dt><?php the_title(); ?></dt>
						<dd>Dek of Post</dd>
					</dl>
				</a>
			</li>
				
			<?php	
				endwhile;
				wp_reset_query();
			?>
			
		</ul>
		
	</div><!--.cards-->
	
</div><!--.wrapper-->

<?php get_footer(); ?>