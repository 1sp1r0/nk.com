<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>

<h2 class="page_title"><?php the_title(); ?></h2>

<?php
the_content(); 
endwhile;endif; 
?>