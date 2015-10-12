<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="takeover-content wrapper">

		<section class="takeover-content-left">

			
			<?php get_template_part('content-expanded'); ?>

		</section>

		<section class="takeover-content-right">


			<?php get_template_part('content-adventure-guide'); ?>

		</section>
		
	</section>

	<div class="post_nav wrapper" role="navigation">
		<div class="prev_link"><?php previous_post_link('%link','&larr; Previous Post'); ?></div> 
		<div class="next_link"><?php next_post_link('%link','Next Post &rarr;'); ?></div>
	</div>



	<section class="takeover-content-bottom">

		<div class="about-adventure-week wrapper">
			<h4>What is an &ldquo;Adventure Week&rdquo;?</h4>
			<p><?php echo category_description( get_category_by_slug('adventure-week') -> term_id );?></p>
		</div>

		<div class="newsletter-signup wrapper">
			<h4>Sign up below to receive updates on future Adventure Guides.</h4>
			<form>
				<fieldset>
					<input type="email" name="email" placeholder="Email Address" />
					<input type="submit" name="submit" val="Subscribe" />
				</fieldset>
			</form>
		</div>

	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>