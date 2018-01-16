<?php

get_header(); 

get_template_part( 'template-parts/content', 'site-hero2' );

$query = new WP_Query('pagename=portfolio');
if( $query->have_posts() ){

	while( $query->have_posts() ){ $query->the_post();

		if( get_field('portfolio_list') ) {
			get_template_part( 'template-parts/content', 'portfolio-block' );
		}
		
	}
	wp_reset_postdata(); 

} 

else echo 'Записей нет.';

get_template_part( 'template-parts/content', 'newsletter' );

get_footer();

?>
