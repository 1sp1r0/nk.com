<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="wrapper">
	
	<h2 class="page_title"><?php the_title(); ?></h2>
	
	<p class="article_summary" role="contentinfo"><?php the_field('article_summary'); ?></p>
	
	<?php
	$tags = get_the_tags();
	
	if($tags){
		echo '<dl><dt class="label">Tags</dt><br/>';
		
		foreach($tags as $tag){
			if(end($tags) !== $tag){
				$comma = ',';

			}else{ $comma = ''; }
			
			echo '<dd>'.$tag->name.$comma.' </dd>';
		}
		
		echo '</dl>';
	}
	?>
	
	
	
	<article class="whitney_book" role="article">
		<?php if(get_field('image')){ echo '<img class="article_image" src="'.get_field('image').'" />'; } ?>
		<?php the_content(); ?>
	</article>
	
	<p class="byline">Posted by <?php the_author(); ?> in <?php the_date('F, Y'); ?></p>
	
	<div class="post_nav" role="navigation">
		<div class="prev_link"><?php previous_post_link('%link','&larr; Previous Post'); ?></div> 
		<div class="next_link"><?php next_post_link('%link','Next Post &rarr;'); ?></div>
	</div>
	
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>