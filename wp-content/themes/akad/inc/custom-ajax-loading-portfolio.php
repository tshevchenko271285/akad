<?php
add_action('wp_ajax_loading_portfolio', 'loading_portfolio');
add_action('wp_ajax_nopriv_loading_portfolio', 'loading_portfolio');
function loading_portfolio() {
	$category_id = isset($_POST['category']) ? $_POST['category'] : false;
	$exclude = isset($_POST['exclude']) ? $_POST['exclude'] : false;

	if(!$exclude || !$category_id) return;

	$args = [
		'post_type' => 'portfolio',
		'posts_per_page' => 12,
		'post__not_in' => $exclude,
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'id',
				'terms' => $category_id
			)
		)	
	];
	$query = new WP_Query($args); 
	if( $query->have_posts() ){
		$response = [];
		while( $query->have_posts() ){ $query->the_post();
			get_template_part( 'template-parts/content', 'portfolio-single-work' );
		}
		wp_reset_postdata();
	} 
	else wp_die();
	wp_die(); 
}