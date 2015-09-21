<?php
remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' );
/* Support pour un header personalise */
$args_header = array(
	'width'         => 225,
	'height'        => 100,
	'default-image' => get_template_directory_uri() . '/images/logo-b.png',
);
/*Changement de l'affichage des widget */
if ( function_exists('register_sidebar') )
register_sidebar(array(
	'before_widget' => '<section id="widget" class="sidebar-block">',
	'after_widget' => '</div></section>',
	'before_title' => '<h2>',
	'after_title' => '</h2><div class="sidebar-block-content">',
	));
add_theme_support( 'custom-header', $args_header );

if ( function_exists('register_sidebar') )
    register_sidebar();

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
 * Register the sidebar area for language
 *
 */
function langues_widgets_init() {
	register_sidebar( array(
		'name' => 'Langues sidebar',
		'before_widget' => '<section id="widget" class="sidebar-block">',
		'after_widget' => '</div></section>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="sidebar-block-content">',
	) );
}
add_action( 'widgets_init', 'langues_widgets_init' );

/**
 * Register the sidebar area for info panel
 *
 */
function info_widgets_init() {
	register_sidebar( array(
		'name' => 'Info Panel',
		'before_widget' => '<section id="widget" class="info-panel"><div class="info-panel-head"></div>',
		'after_widget' => '</div></section>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="info-panel-content">',
	) );
}
add_action( 'widgets_init', 'info_widgets_init' );

/**
 * Register the sidebar area for the poster
 *
 */
function poster_widgets_init() {
	register_sidebar( array(
		'name' => 'Poster sidebar',
		'before_widget' => '<section id="widget" class="sidebar-block">',
		'after_widget' => '</div></section>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="sidebar-block-content">',
	) );
}
add_action( 'widgets_init', 'poster_widgets_init' );

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
	//style.css
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	// bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	// countdown
	wp_enqueue_script( 'Countdown', get_template_directory_uri() . '/countdown/countdown.js', array(), '1.0.0', false );
	// Jquery
	wp_enqueue_script( 'Jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.0.0', true );
	// Bootstrap js
	wp_enqueue_script( 'Bootstrap',get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'Japan_Impact_script' );
