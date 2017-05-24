<?php
remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' );
/* Support pour un header personalise */
$args_header = array(
	'width'         => 700,
	'height'        => 900,
	'default-image' => get_template_directory_uri() . '/images/logo-b.png',
);
add_theme_support( 'custom-header', $args_header );

// test si un page est un enfant,petit-enfant etc... d'une autre
function is_child($pageID) { 
	global $post; 
	if( is_page() && (($post->post_parent==$pageID) || ($post->ancestors && in_array( $pageID, $post->ancestors) )  )) {
               return true;
	} else { 
               return false; 
	}
}


/**
* Register the menu
* 
*/
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Nav Menu' ));
}
add_action( 'init', 'register_my_menu' );


/**
*	Enqueuing script and styles
*
*/
function Japan_Impact_script () {
	// bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	//style.css
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	// countdown
	wp_enqueue_script( 'Countdown', get_template_directory_uri() . '/countdown/countdown.js', array(), '1.0.0', false);
	// Jquery
	wp_enqueue_script( 'jquery');
	// Bootstrap js
	wp_enqueue_script( 'Bootstrap',get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'Japan_Impact_script' );