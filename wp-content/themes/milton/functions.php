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
	return 25;
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

?>