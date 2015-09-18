<?php get_header(); ?>
	
	<section id="homepage_lead" role="region">
		<div class="page_wrapper clear">
			<p class="blue largest whitney_semi_bold">Nothing is more powerful than a community of passionate people.</p>
			<hr />
			<p class="sentinel larger">When people join together&nbsp;as&nbsp;a&nbsp;community,<br /> they become a force for&nbsp;ideas&nbsp;and&nbsp;action.<br /> No goal is too&nbsp;ambitious.
				<br /> No destination out of reach.
			</p>
			<p class="largest caps leviathan">A community can<br /> go anywhere.</p>
		</div>
	</section>
	
	<section id="who_we_are" role="region">
		<header>
			<h3>Who we are</h3>
			<a href="<?php bloginfo('url');?>/our-story" class="right button">Our Story</a>
		</header>
		
		<section>
			<div class="page_wrapper clear">
				<h4 class="larger sentinel_italic">Our Purpose</h4>
				<p class="sentinel larger">We bring people together<br /> to share in the adventure<br /> of creating the future.</p>
				<ul>
					<li>
						<dl>
							<dt>Inspire Movements</dt>
							<dd>Activate the people who care about you most.</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>Craft Stories</dt>
							<dd>Powerfully communicate who you are and why it matters.</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>Create Value</dt>
							<dd>Build your brand and culture into indispensable assets.</dd>
						</dl>
					</li>
				</ul>
			</div>
		</section>
				
	</section>
	
	<section id="who_we_work_with" role="region">
		
			<header>
					<h3>Who do we work with</h3>
					<a class="right button" href="<?php bloginfo('url'); ?>/the-work">Our Work</a>
					<?php 
						$args = array( 'post_type' => 'home-logo', 'posts_per_page' => '-1' );
						$loop = new WP_Query( $args );
						$postCount = $loop->found_posts;
						$i = 1;
						$j = 1;
						if($loop->have_posts()){ 
							echo '<ul>';
							echo '<div class="logo-set active" id="logos_1">'; 
							while ( $loop->have_posts() ) : $loop->the_post();
								if(get_field('logo_case_study') != null){ $link = true; }
								
								echo '<li>';
								if($link == true){ echo '<a href="'.get_field('logo_case_study').'">'; }
								echo '<span class="js-image-load" data-src="'.get_field('logo_image').'"></span>';
								if($link == true){ echo '<span class="more">read more</span></a>'; }
								echo '</li>';
							    if(($i % 4 == 0) && ($i != $postCount)){
									echo '</div><!--.logo-set--><div class="logo-set" id="logos_'.($j+1).'">';
									$j++;
								}
								$i++;
								$link = false;
							endwhile; 
						echo '</div><!--.logo-set-->';
						echo '</ul>';
					}
					?>

			</header>
			
			<section>
				<div class="page_wrapper clear">
					
					<p class="leviathan largest caps">Bold leaders, please step forward</p>
					
					<p class="sentinel larger">If you have the passion to make your&nbsp;organization<br />better. If you're prepared to travel&nbsp;into&nbsp;the&nbsp;unknown<br />and toward a better&nbsp;place.</p>
					
					<hr />
					
					<p class="whitney_semi_bold largest">Then New Kind is ready to make the journey with you.</p>
					
					<a href="<?php bloginfo('url'); ?>/get-in-touch" class="button clear">Say Hello</a>
				</div>
			</section>
	</section><!--#who_we_work_with-->	

<?php get_footer(); ?>