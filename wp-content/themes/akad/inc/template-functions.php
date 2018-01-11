<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package akad
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function akad_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'akad_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function akad_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'akad_pingback_header' );

/**
 * Require custom styles theme
 */
require get_template_directory() . '/inc/custom-styles.php';

/**
 * Require custom scripts theme
 */
require get_template_directory() . '/inc/custom-scripts.php';

/**
 * Require custom admin menu setting add item menu
 */
require get_template_directory() . '/inc/custom-admin-menu.php';

/**
 * Require customs Walker_Nav_Menu classes
 */
require get_template_directory() . '/inc/custom-menu.php';


/**
 * Require Customize Image Sizes
 */
require get_template_directory() . '/inc/custom-image-sizes.php';

/**
 * Require Customize Newsletters form
 */
require get_template_directory() . '/inc/custom-newslerrer-from.php';

/**
 * Require My Custom Functions
 */
require get_template_directory() . '/inc/custom-functions.php';
