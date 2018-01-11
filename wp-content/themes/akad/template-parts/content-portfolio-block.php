	<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
$portfolio_list = get_field('portfolio_list')[0];
?>
<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="container">
		<div class="row">
			<div class="section-title">
				<?php echo $portfolio_list['title'] ? '<span>'.$portfolio_list['title'].'</span>' : ''; ?>
				<?php echo $portfolio_list['title'] ? '<p>'.$portfolio_list['description'].'</p>' : ''; ?>
			</div>
		</div>
		<!-- categories  -->
		<div class="col-md-3">
			<div class="row categories-grid wow fadeInLeft">
				<span class="montserrat-text uppercase"><?php echo $portfolio_list['menu_title']; ?></span>
				<nav class="categories">
					<ul class="portfolio_filter">
						<?php 
							$args = array(
								'taxonomy' => 'portfolio_category',
								'hide_empty' => false,
							);
							$terms = get_terms( $args );
						?>
						<li><a href="" class="active" data-filter="*">all</a></li>
						<?php foreach ($terms as $term): ?>
							<li><a href="" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php endforeach ?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- all works -->
		<div class="col-md-9">
			<div class="row portfolio_container">
			<?php
				$args = [
					'post_type' => 'portfolio',
					'posts_per_page'=> $portfolio_list['count'],
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
					<div class="col-md-4 <?php echo $class;?> ">
						<a href="<?php the_permalink(); ?>" class="portfolio_item work-grid wow fadeInUp">
							<?php the_post_thumbnail( 'thumbnail-portfolio', array('srcset' => ' ') ); ?>
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span><?php the_title(); ?></span>
									<em>
									<?php echo $cat_str; ?>
									</em>
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
			</div>
			<!-- end row -->
		</div>
		<!-- all works end -->
	</div>
	<!-- end container -->
</section>
<!-- portfolio -->
