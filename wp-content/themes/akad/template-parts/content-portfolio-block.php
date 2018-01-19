	<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
$portfolio_list = get_sub_field('portfolio_list');
$data['title'] = get_sub_field('title') ? get_sub_field('title') : '';
$data['description'] = get_sub_field('description') ? get_sub_field('description') : '';
$data['menu_title'] = get_sub_field('menu_title') ? get_sub_field('menu_title') : '';
$data['count'] = get_sub_field('count') ? get_sub_field('count') : '-1';
?>
<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="container">
		<div class="row">
			<div class="section-title">

				<?php if ( strlen( $data['title'] ) ): ?>
					<span><?php echo $data['title']; ?></span>
				<?php endif ?>

				<?php if ( strlen( $data['description'] ) ): ?>
					<p><?php echo $data['description']; ?></p>
				<?php endif ?>

			</div>
		</div>
		<!-- categories  -->
		<div class="col-md-3">
			<div class="row categories-grid wow fadeInLeft">

				<?php if ( strlen( $data['menu_title'] ) ): ?>
					<span class="montserrat-text uppercase"><?php echo $data['menu_title']; ?></span>
				<?php endif ?>

				<nav class="categories">
					<ul class="portfolio_filter">
						<li><a href="" class="active" data-filter="*">all</a></li>
						<?php 
							$args = array(
								'taxonomy' => 'portfolio_category',
								'hide_empty' => false,
							);
							$terms = get_terms( $args );
							foreach ($terms as $term): ?>

							<li><a href="" data-filter=".<?php echo $term->slug; ?>" data-category="<?php echo $term->term_taxonomy_id; ?>"><?php echo $term->name; ?></a></li>
							
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
					'posts_per_page'=> $data['count'],
				];
				$query = new WP_Query($args);
				if( $query->have_posts() ){
					while( $query->have_posts() ){ $query->the_post();
					
						get_template_part( 'template-parts/content', 'portfolio-single-work' );
						
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
