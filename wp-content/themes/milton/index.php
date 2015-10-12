<?php /* THIS IS THE TAKEOVER PROTOTYPE */ ?>

<?php get_header(); ?>

	<section class="takeover-title">
		<div class="photo-filter"></div>
		<div class="wrapper">
			<h2>A New Kind Adventure Week</h2>
			<hr />
			<h3>Conquering Brand Positioning</h3>
		</div>
		
	</section>

	
	





		<?php 

			$idObj = get_category_by_slug('brand-positioning');
			$include = $idObj->cat_ID;
			$exclude = '-'.$include;
			$query = new WP_Query( 'cat='.$include);
			$postCount = 0;

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 

			
				if($postCount == 0) : 
					$dayCount = get_field('post_day');
					echo '<h3 class="day-name">'.$dayCount.'</h3>';
					echo '<section class="takeover-content wrapper">';
					echo '<section class="takeover-content-left">';
					get_template_part( 'content-expanded', get_post_format() );
					echo '</section>';
					echo '<section class="takeover-content-right">';
					get_template_part( 'content-adventure-guide' );
					echo '</section>';
					echo '</section>';
					echo '<div class="blogs">';
					
					/*if( ( $postCount == 1 ) && ( $dayCount == get_field('post_day')) ){ 
						echo '<h3 class="day-name">More from '.$dayCount.'</h3>'; 
					}*/

					
					if( $dayCount == get_field('post_day')){
						get_template_part( 'content' ); 
					}else{
						$dayCount = get_field('post_day');
						echo '<h3 class="day-name">'.$dayCount.'</h3>';
						get_template_part( 'content' );
						
					}

					
				endif; 
	 
				$postCount++;

			endwhile; endif; 

				echo '</div>';
			
 			wp_reset_postdata(); 
 		?>




	<section class="takeover-content-bottom">

		<?php get_template_part('content-about-adventure-week'); ?>

		<?php get_template_part('content-newsletter-signup'); ?>

	</section>

	<section class="blogs">
		<h2><span class="wrapper">More from our Blog</span></h2>
		<ul id="infinite-scroll-content">

		<?php 
			$query = new WP_Query( 'cat='.$exclude); 
			
			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				
			<?php get_template_part( 'content', get_post_format() ); ?>
					
		<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
		</ul>
	</section>
	
	
<?php get_footer(); ?>