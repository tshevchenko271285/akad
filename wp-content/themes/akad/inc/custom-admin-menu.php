<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
		'page_title'    => 'Options theme',
		'menu_title'    => 'Options theme',
		'menu_slug'     => 'options-theme',
		'capability'    => 'edit_posts',
		'redirect'  => false
    ));
}
acf_add_options_sub_page(array(
	'page_title' 	=> 'Theme Footer Settings',
	'menu_title'	=> 'Footer',
	'parent_slug'	=> 'options-theme',
));