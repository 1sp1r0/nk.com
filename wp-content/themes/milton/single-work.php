<?php get_header(); ?>
<nav class="sub_nav" role="navigation">
	<ul class="wrapper">
		<?php 
		$sections = get_field('case_study_section');
		
		foreach($sections as $section){
			$title = $section['section_title'];
			echo '<li><a href="#'.str_replace(' ', '-', strtolower($title)).'">'.$title.'</a></li>';
		}
		echo '<li class="if-sticky"><a href="#page_header">To Top</a></li>';
		?>
	</ul>
</nav>

<section class="case_study whitney_book" role="article">

	<header class="wrapper">

		<h2 class="page_title"><?php the_title(); ?></h2>
	
		<p class="case_summary"><?php echo get_field('case_study_subtitle'); ?></p>
	
		<?php
			
		$tags = get_the_tags();
		
		if($tags){
			echo '<dl><dt class="label">Projects</dt><br/>';
			
			foreach($tags as $tag){
				if(end($tags) !== $tag){
					$comma = ',';

				}else{ $comma = ''; }
				
				echo '<dd>'.$tag->name.$comma.' </dd>';
			}
			
			echo '</dl>';
		}
	?>

	</header>

	<?php
		
		foreach($sections as $section){
				
				$title = $section['section_title'];
				echo '<section id="'.str_replace(' ', '-', strtolower($title)).'" name="'.str_replace(' ', '-', strtolower($title)).'" class="content_section" role="region">';
				echo '<h3 class="wrapper"><span>'.$title.'</span></h3>';
				
				foreach($section['case_study_content'] as $content){
					
					if($content['content_image'] == null){
						echo '<div class="sub_section wrapper no-image">';
						echo $content['written_content'];
						echo '</div>';
					}else{
						echo '<div class="sub_section wrapper '.$content['image_width'].'">';
						echo '<img class="right" src="'.$content['content_image'].'" />';
						echo $content['written_content'];
						echo '</div>';
					}
					
				}
				echo '</section>';
			
		}
		
		
		
		if(get_field('quote_exists') == true){
			
			echo '<section class="quote">';
			echo '<img src="'.get_field('case_study_quote_headshot').'" />';
			echo '<blockquote>&ldquo;'.get_field('case_study_quote_text').'&rdquo; <span>'.get_field('case_study_quote_name').' <i>'.get_field('case_study_quote_title').'</i></span></blockquote>';
			echo '</section>';
			
		}
		
		
		?>
		
		<div class="post_nav wrapper" role="navigation">
			<div class="prev_link"><?php previous_post_link('%link', '&larr; Previous Post'); ?></div> 
			<div class="next_link"><?php next_post_link('%link', 'Next Post &rarr;'); ?></div>
		</div>
		
	

</section>

<?php get_footer(); ?>