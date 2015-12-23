<?php

/* Adding Custom Post Types*/

add_action( 'init', 'create_post_type' );

function create_post_type() {
	
	register_post_type( 'home-logo',
	    array(
	      'labels' => array(
	        'name' => __( 'Home Page Logos' ),
	        'singular_name' => __( 'Home Page Logo' )
	      ),
		'supports' => array('title'),
	    'public' => true,
	    'has_archive' => true,
		'rewrite' => array( 'slug' => 'home-logo' )
	    )
	);
	
   register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Team Members' ),
        'singular_name' => __( 'Team Member' )
      ),
	'supports' => array('title'),
    'public' => true,
    'has_archive' => true,
	'rewrite' => array( 'slug' => 'the-team' )
    )
  );
  

  register_post_type( 'work',
    array(
      'labels' => array(
        'name' => __( 'Case Studies' ),
        'singular_name' => __( 'Case Study' )
      ),
	'supports' => array('title'),
	'taxonomies' => array('post_tag'),
    'public' => true,
    'has_archive' => true,
	'rewrite' => array( 'slug' => 'the-work' )
    )
  );

  register_post_type( 'workshops',
    array(
      'labels' => array(
        'name' => __( 'Workshops' ),
        'singular_name' => __( 'Workshop' )
      ),
	'supports' => array('title'),
    'public' => true
    )
  );

	flush_rewrite_rules( false );
}

/* category blog templates */

add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
  foreach( (array) get_the_category() as $cat ) 
  { 
    if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php"; 
    if($cat->parent)
    {
      $cat = get_the_category_by_ID( $cat->parent );
      if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
    }
  } 
  return $t;
}


/* register nav menu */

register_nav_menus( array(
	'main_nav' => 'Main Navigation'
) );

/* function to strip url out of get_avatar function */

/*function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}*/

/* shorten excerpt length & edit ending character */

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// add job title to users

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['job_title'] = 'Job Title';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

//INFINITE SCROLL

add_theme_support( 'infinite-scroll', array(
  'container' => 'infinite-scroll-content',
  //'render' => 'mytheme_infinite_scroll_render',
) );


// SHORTCODES!

function extrainfo( $atts, $content ) {
  $atts = shortcode_atts( array(
  ), $atts, 'extrainfo' );

  return "<span class='extra-info'>".$content."</span>";
}
add_shortcode( 'extrainfo', 'extrainfo' );

function guidevoice( $atts, $content ) {
  $atts = shortcode_atts( array(
  ), $atts, 'guidevoice' );

  return "<div class='guide-note'>".$content."</div>";
}
add_shortcode( 'guidevoice', 'guidevoice' );

// CUSTOM IMAGES SIZES AND CROPS

add_image_size( 'small', 320, 320 );
add_image_size( 'med-large', 800, 800 );
add_image_size( 'x-large', 1600, 1600 );
add_image_size( 'phone', 320, 400 );
add_image_size( 'large-head', 1024 );


function nk_custom_header_image_sizes( $imageObj , $selector ){


  $phoneImage = $imageObj['sizes']['phone'];
  $medImage = $imageObj['sizes']['medium-large'];
  $largeImage = $imageObj['sizes']['large'];
  $xlargeImage = $imageObj['sizes']['x-large'];
  $mediaQueries = array(
    '500'  => $medImage,
    '800'  => $largeImage, 
    '1600' => $xlargeImage
  );

  echo '<style>';
  echo $selector . '{';
  echo 'background-image: url(' . esc_url( $phoneImage ) . ');';
  echo '}';
  foreach( $mediaQueries as $px => $url ){
    echo '@media screen and (min-width: ' . esc_html( $px ) . 'px){';
    echo esc_html( $selector ) . '{';
    echo 'background-image: url(' . esc_url( $url ) . ');';
    echo '}';
    echo '}';
  }  
  echo '</style>';
}

function nk_custom_profile_image_sizes( $imageObj , $selector ){


  $phoneImage = $imageObj['sizes']['phone'];
  $medImage = $imageObj['sizes']['med-large'];
  $largeImage = $imageObj['sizes']['large'];
  $xlargeImage = $imageObj['sizes']['x-large'];
  $mediaQueries = array(
    '340'  => $medImage
  );

  echo '<style>';
  echo $selector . '{';
  echo 'background-image: url(' . esc_url( $phoneImage ) . ');';
  echo '}';
  foreach( $mediaQueries as $px => $url ){
    echo '@media screen and (min-width: ' . esc_html( $px ) . 'px){';
    echo esc_html( $selector ) . '{';
    echo 'background-image: url(' . esc_url( $url ) . ');';
    echo '}';
    echo '}';
  }  
  echo '</style>';
}

function nk_custom_crop_image_sizes( $imageObj , $selector ){


  $phoneImage = $imageObj['sizes']['phone'];
  $medImage = $imageObj['sizes']['med-large'];
  $largeImage = $imageObj['sizes']['large'];
  $xlargeImage = $imageObj['sizes']['x-large'];
  $mediaQueries = array(
    '340'  => $medImage,
    '800'  => $largeImage, 
    '1600' => $xlargeImage
  );

  echo '<style>';
  echo $selector . '{';
  echo 'background-image: url(' . esc_url( $phoneImage ) . ');';
  echo '}';
  foreach( $mediaQueries as $px => $url ){
    echo '@media screen and (min-width: ' . esc_html( $px ) . 'px){';
    echo esc_html( $selector ) . '{';
    echo 'background-image: url(' . esc_url( $url ) . ');';
    echo '}';
    echo '}';
  }  
  echo '</style>';
}

function nk_custom_image_sizes( $imageObj ){

    $phoneImage = $imageObj['sizes']['phone'];
    $medImage = $imageObj['sizes']['med-large'];
    $largeImage = $imageObj['sizes']['large'];
    $xlargeImage = $imageObj['sizes']['x-large'];
    $mediaQueries = array(
      '340'  => $medImage,
      '800'  => $largeImage,
      '1600' => $xlargeImage
    );

    echo '<picture>';
    foreach( $mediaQueries as $px => $url ){
      echo '<source media="(min-width: ' . esc_html( $px ) . 'px" srcset="' . esc_url( $url ) . '">';
    }
    echo '<source srcset="' . esc_url( $phoneImage ) . '">';
    echo '<img src="' . esc_url( $phoneImage ) . '" alt="">';
    echo '</picture>';
}


?>