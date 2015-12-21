<?php get_header(); ?>

<div class="new-wrapper" role="article">

	<?php nk_custom_header_image_sizes( get_field( 'intro_image' ), '.profile-intro-image' ); ?>
	<div class="profile-intro-image"></div>

	<div class="profile">

		<div class="profile-bio">

			<?php
				$contact = get_field('contact_info');
				foreach( $contact as $info ){
					$$info['contact_type'] = $info;
				}
			?>

			<h2><?php echo get_the_title(); ?></h2>
			<h3><?php echo get_field('job_title'); ?></h3>
			<dl>
				<dt class="screen-reader">Contact Info</dt>
				<dd><a href="mailto:<?php echo $email['email']; ?>"><?php echo $email['email']; ?></a></dd>
				<dd class="divider">//</dd>
				<dd><?php echo $phone['number']; ?></dd>
				<div class="social">
				<?php
					foreach( $contact as $info ){
						if( ( $info['contact_type'] == 'phone' ) || ( $info['contact_type'] == 'email') ){
							
							
						}else{
							echo '<a href="#"><img src="' . get_template_directory_uri() . '/assets/team-profiles/' . $info['contact_type'] . '.svg" /></a>';
					
						}

					}
				?>
				</div>
			</dl>

			<?php echo get_field('biography'); ?>

		</div><!--.profile-bio-->

		<div class="profile-feature">

			<?php nk_custom_profile_image_sizes( get_field('headshot'), '.headshot' ); ?>
			<div class="image tile headshot"></div>
			<?php nk_custom_profile_image_sizes( get_field('secondary_headshot'), '.secondary' ); ?>
			<div class="secondary image tile"></div>

		</div><!--.profile-contact-->

	</div><!--.profile-->

	<div class="featured-work">
			<?php

				$featuredWorkCount = 1;
				$featuredWorkTotal = sizeof( get_field('featured_work') );


				foreach( get_field('featured_work') as $work ){


					if( ( $featuredWorkTotal == 5 || $featuredWorkTotal == 4 ) && ( $featuredWorkCount == 1 ) ){
						$flexCount = 'flex2';
					}elseif( ( $featuredWorkTotal == 5 ) && ( $featuredWorkCount == 5 ) ){
						$flexCount = 'flex2';
					}else{
						$flexCount = '';
					}

					if( ( $featuredWorkTotal < 3 ) ){
						if( ( $featuredWorkCount == 2 )){
							echo '<div class="container tall flex2">';
						}else{
							echo '<div class="container tall">';
						}
					}
					elseif( ( $featuredWorkTotal == 3 ) ){					
							echo '<div class="container tall">';
					}elseif( $featuredWorkTotal == 4 ){
						if( $featuredWorkCount == 1){
							echo '<div class="container">';
						}elseif( $featuredWorkCount != 2 ){
							echo '<div class="container tall">';
						}
					}elseif( $featuredWorkTotal == 5 ){
						if( $featuredWorkCount == 1 ){
							echo '<div class="container">';
						}elseif( $featuredWorkCount == 4 ){
							echo '<div class="container">';
						}elseif( $featuredWorkCount == 3 ){
							echo '<div class="container tall">';
						}
					}

					if( $work['nk_content'] == true ){
						$work['url'] = $work['content']->guid;
					}

					echo '<a class="tile ' . $flexCount . '" href="' . $work['url'] .'">';
					nk_custom_crop_image_sizes( $work['photo'], '#count-' . $featuredWorkCount );
					echo '<span id="count-' . $featuredWorkCount . '"></span>';
					echo '<h4>' . $work['title'] . '</h4>';
					echo '<h5>' . $work['sub_title'] . '</h5>';
					echo '</a>';

					if( ( $featuredWorkTotal <= 3 ) ){
						echo '</div>';
					}elseif( ( $featuredWorkTotal == 4 ) && ( $featuredWorkCount == 2) ){
						echo '</div>';
					}elseif( ( $featuredWorkTotal == 4 ) && ( $featuredWorkCount > 2 ) ){
						echo '</div>';
					}elseif( $featuredWorkTotal == 5 ){
						if( $featuredWorkCount == 2 ){
							echo '</div>';
						}elseif( $featuredWorkCount == 5 ){
							echo '</div>';
						}elseif( $featuredWorkCount == 3 ){
							echo '</div>';
						}
					}

					$featuredWorkCount++;
				}

				?>

	</div><!--.featured-work-->

	<?php if( get_field('slack_uid') != null ) : ?>

		<div class="recent-posts slack" data-user="<?php echo get_field('slack_uid'); ?>">
			<h3 class="tab">Recent Posts <span>Powered by <span class="slack">Slack</span></span></h3>
		</div>

	<?php endif; ?>

	<?php nk_custom_header_image_sizes( get_field('spirit_bird'), '.profile-outtro-image' ); ?>
	<div class="profile-outtro-image"></div>
	
</div><!--.new-wrapper-->

<?php get_footer(); ?>