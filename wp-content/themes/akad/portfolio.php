<?php
/*
Template Name: Portfolio
*/
get_header(); ?>


			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'site-hero2' );
				if( get_field('portfolio_list') ) {
					get_template_part( 'template-parts/content', 'portfolio-block' );
				}

				get_template_part( 'template-parts/content', 'newsletter' );

			endwhile; // End of the loop.
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
