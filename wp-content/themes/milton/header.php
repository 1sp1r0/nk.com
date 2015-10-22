<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="keywords" content="Branding, Content, Agency, Design, Marketing, Community, Innovation, Creation">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/70540/772064/css/fonts.css" />
	<link rel="stylesheet" href="//f.fontdeck.com/s/css/9FRVfkomeCh4H19B/qGVFg41Ywo/<?php echo $_SERVER['SERVER_NAME']; ?>/60449.css" type="text/css" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/screen.css?10.2015" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_directory'); ?>/css/print.css" />
	
	<!-- Google Analytics -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    	
		ga('create', 'UA-7648699-1', 'auto');
		ga('send', 'pageview');
    	
		</script>
	<!-- End Google Analytics -->
	<!-- verifying successful git deployment -->
</head>
<body>
	
	<header role="banner" id="page_header">
		<div class="wrapper">
			<a href="<?php bloginfo('url'); ?>"><h1 class="site_title">New Kind</h1></a>
			<a href="#" class="menu_hamburger">Menu</a>
			<nav class="global_nav" role="navigation">
				<ul>
				<?php 
					$args = array(
						'title_li' => '',
						'sort_column' => 'menu_order',
						'items_wrap'  => '<ul id="%1$s" class="YES %2$s">%3$s</ul>',
						'menu' => 'main_nav'
					);
					wp_nav_menu($args); 
				?>
				</ul>
			</nav>
		</div><!--.wrapper-->
	</header>
	
	<?php
		
		if(is_page('home')){
			$pageType = 'home';
		}elseif(is_home()){
			$pageType = 'adventure-guide';
		}elseif(is_singular('workshops')){
			$pageType = 'workshop';
		}elseif(is_singular('work')){
			$pageType = 'work';
		}elseif(is_singular('team')){
			$pageType = 'team';
		}elseif(is_post_type_archive('team')){
			$pageType = 'the_team';
		}elseif(is_post_type_archive('work')){
			$pageType = 'our_purpose';
		}elseif(is_page('workshops')){
			$pageType = 'workshop_landing';
		}elseif(has_category('adventure-week')){
			$pageType = 'adventure-guide';
		}elseif(is_page('blog')){
			$pageType = 'blog';
		}elseif(is_page('get-in-touch')){
				$pageType = 'contact';
		}elseif(is_single()){
			$pageType = 'blog_article';
		}elseif(is_page()){
			$pageType = 'page';
		}elseif(is_archive()){
			$pageType = 'archive';
		}
	
	?>
	
	<section id="main" class="<?php echo $pageType; ?>" role="main">