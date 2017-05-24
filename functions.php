<?php

// Load CSS and JS
function jitheme_enqueue_styles() {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_enqueue_style( 'ji-style', get_stylesheet_uri());
}

function jitheme_enqueue_scripts() {
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js');
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
  wp_enqueue_script( 'ji-countdown', get_template_directory_uri() . '/assets/js/countdown.js');
}
add_action( 'wp_enqueue_scripts', 'jitheme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'jitheme_enqueue_scripts' );

// Register the nav
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Nav Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Customization
$args_header = array(
  'width'         => 700,
  'height'        => 900,
  'default-image' => get_template_directory_uri() . 'assets/images/default-header.jpg',
);
add_theme_support( 'custom-header', $args_header );

?>
