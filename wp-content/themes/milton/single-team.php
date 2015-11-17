<?php get_header(); ?>

<div class="new-wrapper" role="article">

	<div class="profile-intro-image"></div>

	<div class="profile">

		<div class="profile-bio">

			<h2><?php echo get_the_title(); ?></h2>
			<h3><?php echo get_field('job_title'); ?></h3>
			<dl>
				<dt class="screen-reader">Contact Info</dt>
				<dd><a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a></dd>
				<dd class="divider">//</dd>
				<dd><?php echo get_field('phone'); ?></dd>
				<div class="social">
				<?php
					$info = array(
						'skype',
						'twitter',
						'linkedin'
						);
				
					foreach($info as $contact){
					
						$username = get_field($contact);
						
						switch ($contact){
							case('skype'):
								$link = 'skype:'.$username.'?add';
								break;
							case('twitter'):
								$link = 'http://www.twitter.com/'.$username;
								break;
							case('linkedin'):
								$link = $username;
								$username = get_the_title();
								break;
								
						}
						//if($username != null && $link != null){
							echo '<dd><a href="' . $link . '">' . $contact . '</a></dd>';
						//}
					}
				?>
				</div>
			</dl>

			<?php echo get_field('biography'); ?>

		</div><!--.profile-bio-->

		<div class="profile-feature">

			<div class="image tile" style="background-image: url(<?php the_field('headshot'); ?>);"></div>

			<div class="work image tile" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/team-profiles/elise-secondary.jpg'; ?>);"></div>

		</div><!--.profile-contact-->

	</div><!--.profile-->

	<div class="featured-work">

		<div class="container">

			<a class="tile flex2" href="#">
				<span style="background-image: url('http://localhost:8888/newkind/wp-content/themes/milton/assets/images/blog/mountain2-500.jpg');"></span>
				<h4>Brand Positioning Week</h4>
				<h5>A New Kind Adventure Series</h5>
			</a>



			<a class="tile" href="#">
				<span style="background-image: url('http://localhost:8888/newkind/wp-content/themes/milton/assets/team-profiles/elise-innovate.jpg');"></span>
				<h4>Innovate Raleigh</h4>
				<h5>Case Story + Taskforce</h5>
			</a>

		</div>

		<div class="container tall">

			<a class="tile" href="#">
				<span style="background-image: url('http://localhost:8888/newkind/wp-content/themes/milton/assets/team-profiles/elise-argentina.jpg');"></span>
				<h4>Journey to Understand the Importance of Community</h4>
				<h5>How making it alone led to feeling the power of working together.</h5>
			</a>

		</div>

		<div class="container">

			<a class="tile" href="#">
				<span style="background-image: url('http://localhost:8888/newkind/wp-content/themes/milton/assets/team-profiles/elise-welcome.jpg');"></span>
				<h4>New Kind Welcomes Elise Dorsett</h4>
				<h5>Welcome Interview</h5>
			</a>

			<a class="tile flex2" href="http://youcallthisyoga.org/blog/2014/9/30/elise-dorsett-is-advancing-yctys-mission">
				<span style="background-image: url('http://localhost:8888/newkind/wp-content/themes/milton/assets/team-profiles/elise-yoga.jpg');"></span>
				<h4>Bi-Lingual Chair Yoga</h4>
				<h5>Community Engagement</h5>>
			</a>

		</div>

	</div><!--.featured-work-->

	<div class="recent-posts">

		<!--<div class="post">
			<p class="timestamp">10:32am October 28th</p>
			<p>Or perhaps he's wondering why someone would shoot a man before throwing him out of the plane.</p>
		</div>

		<div class="post">
			<p class="timestamp">10:32am October 28th</p>
			<p>Or perhaps he's wondering why someone would shoot a man before throwing him out of the plane.</p>
		</div>

		<div class="post">
			<p class="timestamp">10:32am October 28th</p>
			<p>Or perhaps he's wondering why someone would shoot a man before throwing him out of the plane.</p>
		</div>

		<div class="post">
			<p class="timestamp">10:32am October 28th</p>
			<p>Or perhaps he's wondering why someone would shoot a man before throwing him out of the plane.</p>
		</div>-->

	</div>

	<div class="profile-outtro-image"></div>
	
</div><!--.new-wrapper-->

<?php get_footer(); ?>