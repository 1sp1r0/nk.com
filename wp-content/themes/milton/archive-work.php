<?php get_header(); ?>

<section class="page_section">

<h2 class="page_title dark">Our Work</h2>
<p class="page_summary"><span>We bring people together to share in the adventure of creating the future.</span></p>



	<div class="page_wrapper dark">

	
	<div class="cards">
		
		<ul>
			
			<?php
				$args = array( 'post_type' => 'work' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					//the_title();
					echo '<li class="work-item">';
					echo '<a href="'.get_the_permalink().'"><img src="'.get_field('case_study_thumbnail').'" />';
					echo '<dl><dt>'.get_field('case_study_organization').'</dt><dd>'.get_field('case_study_description').'</dd></dl></a>';
					echo '</li>';
				endwhile;
			?>
			
		</ul>
		
	</div>
			

	</div><!--.page_wrapper-->
	
</section>

<?php get_footer(); ?>