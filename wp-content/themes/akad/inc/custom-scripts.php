<?php
/**
 * Enqueue scripts
 */
function akad_scripts() {

	wp_enqueue_script( 'akad-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'akad-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'akad-jquery-214-script', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '20151215', false );
	wp_enqueue_script( 'social-buttons-script', get_template_directory_uri() . '/js/jquery.social-buttons.min.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-isotope-script', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-jquery-flexslider-script', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-smoothScroll-script', get_template_directory_uri() . '/js/smoothScroll.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-jquery-animsition-script', get_template_directory_uri() . '/js/jquery.animsition.min.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-wow-script', get_template_directory_uri() . '/js/wow.min.js', array(), '20151215', true );
	wp_enqueue_script( 'akad-main-script', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );
	wp_localize_script( 'akad-main-script', 'akadCustom', array( 'ajaxurl' => get_site_url() ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'akad_scripts' );