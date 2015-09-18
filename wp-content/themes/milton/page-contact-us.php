<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
<div class="wrapper">

	<h2 class="page_title"><?php the_title(); ?></h2>
	
	<p class="page_summary"><?php the_content(); ?></p>

	<img class="two_thirds right" src="<?php the_field('image'); ?>">

	<div class="padded one_third left"></div>

	<div class="padded one_third left">
		<dl class="indented_list">
			<dt>email:</dt>
			<dd><?php the_field('email'); ?><dd>
			<dt>phone:</dt>
			<dd><?php the_field('phone'); ?></dd>
			<dt>skype</dt>
			<dd><?php the_field('skype'); ?></dd>
			<dt>twitter</dt>
			<dd><?php the_field('twitter'); ?></dd>
		</dl>
	</div>

</div>


<?php 
endwhile;endif;
get_footer(); 
?>