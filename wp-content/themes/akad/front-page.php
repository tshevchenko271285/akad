<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

get_header(); ?>


			<?php
			while ( have_posts() ) : the_post();

				if(get_field('site_hero')) {
					get_template_part( 'template-parts/content', 'site-hero' );
				}

				get_template_part( 'template-parts/content', 'history-of-agency' );
				
				if(get_field('services')) {
					get_template_part( 'template-parts/content', 'services' );
				}
				if( get_field('portfolio_list') ) {
					get_template_part( 'template-parts/content', 'portfolio-block' );
				}

				get_template_part( 'template-parts/content', 'newsletter' );

			endwhile; // End of the loop.
			?>

<script type="text/javascript" charset="utf-8">
		$(window).load(function() {
			new WOW().init();

			// initialise flexslider
			$('.site-hero').flexslider({
				animation: "fade",
				directionNav: false,
				controlNav: false, 
				keyboardNav: true,
				slideToStart: 0,
				animationLoop: true,
				pauseOnHover: false,
				slideshowSpeed: 4000, 
			});


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
//get_sidebar();
get_footer();
?>
