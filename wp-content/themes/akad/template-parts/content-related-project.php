			
<?php 
	$related_project_title = get_field('related_project_title', 'option') ? get_field('related_project_title', 'option') : '';
	$related_project_text = get_field('related_project_text', 'option') ? get_field('related_project_text', 'option') : '';
	$related_project_button_text = get_field('related_project_button_text', 'option') ? get_field('related_project_button_text', 'option') : '';
	$related_project_button_url = get_field('related_project_button_url', 'option') ? get_field('related_project_button_url', 'option') : '';
?>
		<!-- start related projects -->
		<div class="related_projects">
			<h5 class="montserrat-text uppercase" style="margin-bottom:50px"><?php echo $related_project_title; ?></h5>
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
				<?php echo $related_project_text; ?>
			</p>
			<a href="<?php echo $related_project_button_url; ?>/portfolio" class="btn green" style="float:right"><span><?php echo $related_project_button_text; ?></span></a>
		</div>
	</div>
</div>