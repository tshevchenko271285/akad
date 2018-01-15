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
	wp_reset_postdata(); // сбрасываем переменную $post
} 
else echo 'Записей нет.';

get_template_part( 'template-parts/content', 'newsletter' );
?>
<script type="text/javascript" charset="utf-8">
		$(window).load(function() {

			// initialize isotope
			var $container = $('.portfolio_container');
			$container.isotope({
				filter: '*',
			});
		 
			$('.portfolio_filter a').click(function(){
				$('.portfolio_filter .active').removeClass('active');
				$(this).addClass('active');
		 
				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 500,
						animationEngine : "jquery"
					}
				});
				return false;
			}); 
		});
	</script>
<?php
get_footer();
?>
