<?php
/*
Template Name: Portfolio
*/
get_header(); 
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'site-hero2' );
	if( get_field('portfolio_list') ) {
		get_template_part( 'template-parts/content', 'portfolio-block' );
	}

	get_template_part( 'template-parts/content', 'newsletter' );

endwhile; // End of the loop.
get_footer();
?>
