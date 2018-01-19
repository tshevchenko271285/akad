<?php 
	$data['title'] = get_sub_field('title') ? get_sub_field('title') : '';
	$data['desc'] = get_sub_field('desc') ? get_sub_field('desc') : '';
?>	
	<section class="pricing_plans">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<?php if ( strlen( $data['title'] ) ): ?>
						<span><?php echo $data['title']; ?></span>
					<?php endif ?>
					<?php if ( strlen( $data['desc'] ) ): ?>
						<p><?php echo $data['desc']; ?></p>
					<?php endif ?>
				</div>
			</div>
			<?php
			$args = [
				'post_type' => 'pricing_plans',
				'post_per_page' => 3,
			];
			$query = new WP_Query($args);
			if( $query->have_posts() ){
				?> <div class="row"> <?php
				while( $query->have_posts() ){ $query->the_post();
					$price = get_field('price') ? get_field('price') : '';
					$text_button = get_field('text_button') ? get_field('text_button') : '';
					$list = is_array( get_field('list') ) ? get_field('list') : false;
				?>
					<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".<?php echo wp_rand( 1, 9 ) ?>s">
						<div class="pricing_plan">

							<?php if ( strlen( get_the_title() ) ): ?>
								<div class="plan_title montserrat-text uppercase"><?php the_title(); ?></div>
							<?php endif ?>

							<?php if ( strlen( $price ) ): ?>
								<div class="plan_price montserrat-text uppercase"><?php echo $price; ?></div>
							<?php endif ?>
							
							<?php if ( $list ): ?>
								<ul class="list">
									<?php foreach ($list as $list_item): ?>
										<li><?php echo $list_item['list_item']; ?></li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>
							
							<a href="<?php the_permalink(); ?>" class="btn green"><span>get started</span></a>
						</div>
					</div>
				<?php
				}
				wp_reset_postdata(); // сбрасываем переменную $post
				?> </div> <?php
			} 
			else echo 'Записей нет.';
			?>
		</div>
	</section>