<?php
/**
 * Enqueue styles.
 */
function akad_styles() {

	wp_enqueue_style( 'akad-style', get_stylesheet_uri() );

	wp_enqueue_style( 'akad-bootstrap-style', get_template_directory_uri() . '/layouts/bootstrap.min.css' );
	wp_enqueue_style( 'akad-ionicons-style', get_template_directory_uri() . '/layouts/ionicons.min.css' );
	wp_enqueue_style( 'akad-flexslider-style', get_template_directory_uri() . '/layouts/flexslider.css' );
	wp_enqueue_style( 'akad-animsition-style', get_template_directory_uri() . '/layouts/animsition.min.css' );
	wp_enqueue_style( 'akad-animate-style', get_template_directory_uri() . '/layouts/animate.css' );
	wp_enqueue_style( 'akad-style-style', get_template_directory_uri() . '/layouts/style.css' );

}
add_action( 'wp_enqueue_scripts', 'akad_styles' );

/*	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/flexslider.css">
	<link rel="stylesheet" href="assets/css/animsition.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/style.css">
*/