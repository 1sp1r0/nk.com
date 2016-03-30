<!DOCTYPE html>
<html>
<head>
	<title><?php echo $metaTitle; ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $metaDescription; ?>">
	<meta name="keywords" content="<?php echo $metaKeywords; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/70540/772064/css/fonts.css" />
	<link rel="stylesheet" href="//f.fontdeck.com/s/css/9FRVfkomeCh4H19B/qGVFg41Ywo/<?php echo $_SERVER['SERVER_NAME']; ?>/60449.css" type="text/css" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/screen.css?3.30.2016v1.0" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('template_directory'); ?>/css/print.css" />
	<meta property="og:title" content="<?php echo $metaTitle; ?>" />
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/social-icons/facebook-og.png" />
	<meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
	<meta property="og:description" content="<?php echo $metaDescription; ?>" />
	
	<?php
		if( $_SERVER['HTTP_HOST'] == 'newkind.com' ){
			// only include analytics if on production
			include( get_template_directory() . '/includes/ga-tracking.php' );
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
	
	<?php $pageType = 'landing'; ?>
	
	<section id="main" class="<?php echo $pageType; ?>" role="main">