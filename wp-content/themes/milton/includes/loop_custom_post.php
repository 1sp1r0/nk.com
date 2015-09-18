<?php

$the_query = new WP_Query( 'pagename='.$customType );

if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) { $the_query->the_post(); 

?>

<h2 class="page_title"><?php the_title(); ?></h2>
	
<div class="page_summary two_thirds left">
	<?php the_content(); ?>
</div>
	
<?php
} //end while loop
endif;

/* Restore original Post Data */
wp_reset_postdata();

?>
