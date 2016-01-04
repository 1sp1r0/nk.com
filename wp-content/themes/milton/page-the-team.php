<?php get_header(); ?>

<div class="new-wrapper">


	<?php 
		nk_custom_header_image_sizes( get_field( 'intro_image' ), '.page-intro-image' ); 
		nk_custom_header_image_sizes( get_field( 'outtro_image'), '.page-outtro-image' );
		$tommy = get_field('tommy_image')['sizes']['med-large'];
	?>
	<div class="page-intro-image"><h2 class="a11y">The Team</h2></div>

	<div class="cards">
		<ul>

			<?php

			$args = array( 'post_type' => 'team' );
			$loop = new WP_Query( $args );
			$count = 0;
			if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post();
				//the_title();
					echo '<li>';
					echo '<a href="'.get_the_permalink().'"><img src="'.get_field('headshot')['sizes']['med-large'].'" />';
					echo '<dl><dt>'.get_field('first_name').' '.get_field('last_name').'</dt><dd>'.get_field('job_title').'</dd></dl></a>';
					echo '</li>';
					$count++;
			endwhile;endif;

			if( $count % 4  != 0 ){
				echo '<li class="tommy">';
				echo '<img src="' . $tommy . '" />';
				echo '<dl><dt>Tommy the Platypus</dt><dd>Mascot</dd></dl>';
				echo '</li>';
			}
			?>

		</ul>
	</div>

	

	<?php

		$args = array( 'category_name' => 'careers' );
		$loop = new WP_Query( $args );
		if ( $loop -> have_posts() ) : 
			echo '<div class="join-us">';
			echo '<h3>Want to join our team?</h3>';
			echo '<ul class="posts">';
	
			while ( $loop -> have_posts() ) : $loop -> the_post();
			//the_title();
				echo '<li class="post">';
				echo '<h4><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h4>';
				echo '<p class="post-date">Posted on ' . get_the_date() . '</p>';
				echo '</li>';
			endwhile;
	
			echo '</ul>';
			echo '</div>';

		endif;
	?>
	
	<div class="page-outtro-image"></div>

</div>

	
<?php

get_footer();
?>