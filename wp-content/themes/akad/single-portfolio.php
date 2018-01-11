<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package akad
 */
$single_portfolio['facebook_url'] = get_field('footer_facebook_url', 'options');
$single_portfolio['twitter_url'] = get_field('footer_twitter_url', 'options');
$single_portfolio['linkedin_url'] = get_field('footer_linkedin_url', 'options');
$single_portfolio['pinterest_url'] = get_field('footer_pinterest_url', 'options');

get_header();


while ( have_posts() ) : the_post();

	$slides_url = get_field('slides');
	get_template_part( 'template-parts/content', 'site-hero2' );
	get_template_part( 'template-parts/content', 'portfolio-slider' );
?>


	<section>
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span><?php the_title(); ?></span>
					<p><?php the_excerpt(); ?></p>
				</div>
			</div>

			<div class="row">
				<!-- start content -->
				<div class="col-md-9 wow fadeInUp">
					<?php the_content(); ?>
				</div>
				<!-- end content -->

				<!-- start sidebar -->
				<div class="col-md-3 wow fadeInUp" data-wow-delay=".1s">
					<ul class="list">
						<?php 
							$tags = wp_get_object_terms( get_the_id(), 'portfolio_tags' );
						?>
						<?php foreach ($tags as $tag): ?>
							<li><?php echo $tag->name; ?></li>
						<?php endforeach ?>
					</ul>
					<h5 class="uppercase montserrat-text" style="margin-top:30px;">share</h5>
					<ul class="social-icons" style="margin-top:20px;">
						<li><a href="javasript:void(0);" data-social="fb"><i class="icon ion-social-facebook"></i></a></li>
						<li><a href="javasript:void(0);" data-social="tw"><i class="icon ion-social-twitter"></i></a></li>
						<li><a href="javasript:void(0);" data-social="ln"><i class="icon ion-social-linkedin"></i></a></li>
						<li><a href="javasript:void(0);" data-social="pt"><i class="icon ion-social-pinterest"></i></a></li>
					</ul>
				</div>
				<!-- end sidebar -->

			</div>

			<!-- start pagination -->
			<div class="pages_pagination">
				<a href="<?php echo get_site_url(); ?>/portfolio" class="all"><i class="icon ion-grid"></i></a>
				<a href="<?php echo get_next_post()->guid; ?>" class="prev"><i class="icon ion-arrow-left-c"></i></a>
				<a href="<?php echo get_previous_post()->guid; ?>" class="next"><i class="icon ion-arrow-right-c"></i></a>
			</div>
			<!-- end pagination -->

			<!-- start related projects -->
			<div class="related_projects">
				<h5 class="montserrat-text uppercase" style="margin-bottom:50px">related projects</h5>
				<?php
				$args = [
					'post_type' => 'portfolio',
					'posts_per_page'=> 4,
				];
				$query = new WP_Query($args);
				if( $query->have_posts() ){
					while( $query->have_posts() ){ $query->the_post();
						$cats = wp_get_object_terms( get_the_id(), 'portfolio_category' );
						$class = '';
						$cat_str = '';
						foreach ($cats as $cat) {
							$class .= $cat->slug . " ";
							$cat_str .= $cat->name . " ";
						}
					?>
					<!-- single work -->
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="<?php the_permalink(); ?>" class="portfolio_item wow fadeInUp">
							<?php the_post_thumbnail( 'thumbnail-portfolio', array('srcset' => ' ') ); ?>
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span><?php the_title(); ?></span>
									<em><?php echo $cat_str; ?></em>
								</div>
							</div>
						</a>
					</div>
					<!-- end single work -->
					<?php
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				} 
				else echo 'Записей нет.';
				?>
				</div><!-- end related projects -->
			</div><!-- end row -->
			<!-- end related projects -->

		</div><!-- end container -->
	</section>


	<!-- light gray section -->
	<div class="container">
		<div class="light-gray-section wow fadeInUp" style="padding:15px 30px">
			<div class="row">
				<p class="italic" style="float:left;line-height:50px;margin:0">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
				</p>
				<a href="<?php echo get_site_url(); ?>/portfolio" class="btn green" style="float:right"><span>read more</span></a>
			</div>
		</div>
	</div>
<?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
<script type="text/javascript" charset="utf-8">
	$(window).load(function() {
		new WOW().init();
		// initialize flexslider
		$('.project_images').flexslider({
			directionNav : false,
			controlNav : false
		});
		// initialize social buttons
		$("[data-social]").socialButtons();
		//console.log($("[data-social]"));
	});
</script>
<?php
endwhile; // End of the loop.
get_footer();
