<?php get_header(); ?>

<div class="new-wrapper">


	<?php
	nk_custom_header_image_sizes( get_field( 'intro_image' ), '.page-intro-image' ); 
	?>
<div class="page-intro-image"><h2 class="a11y"><?php esc_html( the_title() ); ?></h2></div>




	
	<div class="cards tiles">
		
		<ul>
			
			<?php
				$args = array( 'post_type' => 'work' );
				$loop = new WP_Query( $args );
				$count = 0;
				while ( $loop->have_posts() ) : $loop->the_post();
					//the_title();
					echo '<li>';
					$bgimage = esc_url( get_field('case_study_thumbnail' )); 
					//nk_custom_profile_image_sizes( get_field('case_study_thumbnail'), '#count-' . $count );
					echo '<a class="tile" href="'.get_the_permalink().'"><span id="count-' . $count . '" style="background-image: url(' . $bgimage . ');"></span>';
					echo '<dl><dt>'.get_field('case_study_organization').'</dt><dd>'.get_field('case_study_description').'</dd></dl></a>';
					echo '</li>';
					$count++;
				endwhile;
			?>
			
		</ul>
		
	</div>
			

	
</div>

<?php get_footer(); ?>