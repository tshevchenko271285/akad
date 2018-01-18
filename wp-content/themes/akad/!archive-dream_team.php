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
get_template_part( 'template-parts/content', 'dream-team' );
				while ( have_posts() ) : the_post();
					$delay_wow = rand ( 1, 9 );
					$id = get_the_id();
					$cats = wp_get_object_terms( $id, 'positions' );
					$cat_str = '';
					foreach ($cats as $cat) {
						$cat_str .= $cat->name . " ";
					}
					?>
					<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".<?php echo $delay_wow; ?>s">
						<div class="team_member">
							<?php the_post_thumbnail( 'thumbnail-dream-team' ); ?>	
							<div class="team_member_hover">
								<div class="team_member_info">
									<div class="team_member_name"><?php the_title(); ?></div>
									<div class="team_member_job"><?php echo $cat_str; ?></div>
								</div>
							</div>
						</div>				
					</div>
					<?php
					
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
