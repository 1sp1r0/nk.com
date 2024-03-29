</section><!--#main-->

<section class="newsletter-signup">
	<div class="wrapper">
		<h3>Subscribe to Updates from New Kind</h3>
		
		<!--[if lte IE 8]>
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
		  hbspt.forms.create({ 
		    css: '',
		    portalId: '532381',
		    formId: 'e4ff35ab-4eeb-44b8-94e7-62f9a6207200'
		  });
		</script>


	</div>
</section>

<footer id="site_footer">
	<div class="wrapper">
		<h1 class="site_title">New Kind</h1>
		
		<section class="one_third left mission_statement">
		
			<p>We bring people together <br />to share in the adventure <br />of creating the future.</p>
		
			<p>We are community catalysts.</p>
			
		</section>
		
		<section class="one_third right contact_info">
			
			<p class="footer_contact">105 Brooks Avenue | Raleigh, NC 27607<br />(919) 807-1785 | <a href="mailto:hello@newkind.com">hello@newkind.com</a></p>
			<?php //get_search_form( ); ?>
			
			<ul class="footer_social">
				<li><a href="https://plus.google.com/+Newkind/posts" class="google">Google+</a></li>
				<li><a href="https://www.linkedin.com/company/642489?trk=tyah&trkInfo=tarId%3A1408127264593%2Ctas%3Anew%20kind%2Cidx%3A2-1-5" class="linkedin">LinkedIn</a></li>
				<li><a href="https://twitter.com/newkind" class="twitter">Twitter</a></li>
				<li><a href="https://www.facebook.com/newkindcommunity" class="facebook">Facebook</a></li>
			</ul>
			
		</section>
		
		<p class="copyright">&copy; <?php echo date('Y'); ?> New Kind</p>
		
	</div>
</footer>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javsacript" src="<?php bloginfo('template_directory'); ?>/js/html5shiv.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js?3.8.2016"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slack.js?1.9.2016"></script>

<?php
	if( $_SERVER['HTTP_HOST'] == 'newkind.com' ){
			// only include analytics if on production
			include( get_template_directory() . '/includes/hubspot-tracking.php' );
		}
?>
</body>
</html>