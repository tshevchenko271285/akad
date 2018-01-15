<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package akad
 */

get_header(); 
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'site-hero2' );
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<div class="single_post">
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					</div>
					<?php get_template_part( 'template-parts/content', 'pagination' ); ?>
				</div><!-- end col -->
				
				<div class="col-md-3"> <!-- start sidebar -->
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div> <!-- end sidebar -->

			</div><!-- end row -->
		</div><!-- end container -->
	</section>
	<?php get_template_part( 'template-parts/content', 'newsletter' ); ?>

<?php
endwhile; // End of the loop.
get_footer();
