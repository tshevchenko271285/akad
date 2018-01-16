<?php 
	$delay_wow = rand ( 1, 9 );
	$id = get_the_id();
	$cats = wp_get_object_terms( $id, 'portfolio_category' );
	$class = '';
	$cat_str = '';
	foreach ($cats as $cat) {
		$class .= $cat->slug . " ";
		$cat_str .= $cat->name . " ";
	}
?>
<!-- single work -->
<div class="col-md-4 <?php echo $class;?>" data-portfolio-id="<?php echo $id ?>">
	<a href="<?php the_permalink(); ?>" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".<?php echo $delay_wow; ?>s">
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