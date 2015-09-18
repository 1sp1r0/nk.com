<?php get_header(); ?>

	<section class="page_section">
		<h2 class="page_title dark">The Team</h2>

		
		<div class="page_wrapper dark">


			<div class="cards">

			<ul>

				<?php
				
				$args = array( 'post_type' => 'team' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					//the_title();
						echo '<li>';
						echo '<a href="'.get_the_permalink().'"><img src="'.get_field('headshot_thumbnail').'" />';
						echo '<dl><dt>'.get_field('first_name').' '.get_field('last_name').'</dt><dd>'.get_field('job_title').'</dd></dl></a>';
						echo '</li>';
				endwhile;
				?>

			</ul>

		</div>
	</section>
<?php

get_footer();
?>