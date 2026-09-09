<?php
/**
 * Lebenslinie Magazin functions and definitions
 *
 * @package lebenslinie-magazin
 */

if ( ! function_exists( 'lebenslinie_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function lebenslinie_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register Block Theme Navigation Menus
		register_nav_menus( array(
			'primary' => __( 'Hauptmenü', 'lebenslinie-magazin' ),
			'footer'  => __( 'Footer Menü', 'lebenslinie-magazin' ),
		) );

		// Enqueue Editor Styles for Gutenberg Block Editor
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
	}
endif;
add_action( 'after_setup_theme', 'lebenslinie_setup' );

/**
 * Enqueue scripts and styles.
 */
function lebenslinie_scripts() {
	// Enqueue Google Fonts (Playfair Display & Cormorant Garamond for Editorial Feel)
	wp_enqueue_style( 'lebenslinie-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap', array(), null );

	// Enqueue Theme Main Stylesheet
	wp_enqueue_style( 'lebenslinie-style', get_stylesheet_uri(), array(), '2.0.0' );

	// Enqueue Custom Slider JS
	wp_enqueue_script( 'lebenslinie-slider-js', get_template_directory_uri() . '/assets/js/slider.js', array(), '2.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'lebenslinie_scripts' );

/**
 * Register Custom Block Pattern Categories
 */
function lebenslinie_register_pattern_categories() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'lebenslinie-patterns',
			array( 'label' => __( 'Lebenslinie Magazin Layouts', 'lebenslinie-magazin' ) )
		);
	}
}
add_action( 'init', 'lebenslinie_register_pattern_categories' );
