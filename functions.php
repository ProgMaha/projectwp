<?php
/**
 * Digital Online Courses functions
 */

if ( ! function_exists( 'digital_online_courses_styles' ) ) :
	function digital_online_courses_styles() {
		// Register theme stylesheet.
		wp_register_style('digital-online-courses-style',
			get_template_directory_uri() . '/style.css',array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'digital-online-courses-style' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'digital_online_courses_styles' );

/**
 * About Theme Function
 */
require get_theme_file_path( '/about-theme/about-theme.php' );