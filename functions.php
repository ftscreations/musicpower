<?php
/**
 * Artist 2 Fans functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Artist 2 Fans
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'A2F__VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function a2f__setup() {
	/**
	 * Makes Artist 2 Fans available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on Artist 2 Fans, use a find and replace
	 * to change 'a2f_' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'a2f_', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'a2f__setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function a2f__scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'a2f_', get_template_directory_uri() . "/assets/js/artist_2_fans{$postfix}.js", array(), A2F__VERSION, true );
		
	wp_enqueue_style( 'a2f_', get_template_directory_uri() . "/assets/css/artist_2_fans{$postfix}.css", array(), A2F__VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'a2f__scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function a2f__header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'a2f__humans', $humans );
 }
 add_action( 'wp_head', 'a2f__header_meta' );