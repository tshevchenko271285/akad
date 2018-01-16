<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

get_header(); 
get_template_part( 'template-parts/content', 'site-hero2' );
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'post-in-archive' );
				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			<!-- pagination -->
				<?php get_template_part( 'template-parts/content', 'pagination-archive' ); ?>
			</div><!-- end col -->
			<div class="col-md-3"> <!-- start sidebar -->
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div> <!-- end sidebar -->

		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php
get_footer();
