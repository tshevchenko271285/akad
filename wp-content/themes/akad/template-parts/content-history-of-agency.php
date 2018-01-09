<?php
/**
 * Template part for displaying HISTORY OF AGENCY Block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

$attr = array(
			'post_type' => 'history_of_agency',
			'posts_per_page'=>1, 
			);
$query = new WP_Query($attr); 
if( $query->have_posts() ){
	while( $query->have_posts() ){ $query->the_post();
	?>
	<!-- HISTORY OF AGENCY -->
	<div class="container">
		<div class="agency">
			<div class="col-md-5 col-sm-12">
				<div class="row">
				<?php 
					if( has_post_thumbnail() ) {
						the_post_thumbnail(array(400, 475)); 
					}
				?>
				</div>
			</div>
			<div class="col-md-offset-1 col-md-6 col-sm-12">
				<div class="row">
					<div class="section-title">
						<span><?php the_title(); ?></span>
					</div>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn green" style="float:right;margin-top:30px"><span>read more</span></a>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	wp_reset_postdata();
} 
else echo 'Записей нет.';
?>
