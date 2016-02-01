<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="keywords" content="Branding, Content, Agency, Design, Marketing, Community, Innovation, Creation">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/70540/772064/css/fonts.css" />
	<link rel="stylesheet" href="//f.fontdeck.com/s/css/9FRVfkomeCh4H19B/qGVFg41Ywo/<?php echo $_SERVER['SERVER_NAME']; ?>/60449.css" type="text/css" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/screen.css?1.22.2016v1.1" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_directory'); ?>/css/print.css" />
	<meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title('-'); ?>" />
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/social-icons/facebook-og.png" />
	<meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
	<meta property="og:description" content="We bring people together to share in the adventure of creating the future. We're a New Kind of agency." />
	
	<?php
		if( get_bloginfo('url') == 'http://newkind.com' ){
			// only include analytics if on production
			include_once(get_template_directory_uri() . '/includes/ga-tracking.php');
		}
	?>

</head>
<body>
	
	<header role="banner" id="page_header">
		<div class="wrapper">
			<a href="<?php bloginfo('url'); ?>"><h1 class="site_title">New Kind</h1></a>
			<a href="#" class="menu_hamburger">Menu</a>
			<nav class="global_nav" role="navigation">
				<div class="nav_utilities">
					<a href="#" id="close-link">Close</a>
					<a href="<?php echo bloginfo('url'); ?>" id="home-link">Home</a>
				</div>
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
			$pageType = 'new-wrapper';
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