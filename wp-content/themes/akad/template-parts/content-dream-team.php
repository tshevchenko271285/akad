<?php 
	$data['title'] = get_sub_field('title') ? get_sub_field('title') : '';
	$data['desc'] = get_sub_field('desc') ? get_sub_field('desc') : '';
	$data['count_rows'] = get_sub_field('count_rows') ? get_sub_field('count_rows') : '';
	$data['post_type'] = 'dream_team';
?>	
<section>
	<div class="container">
		<div class="row">
			<div class="section-title">

				<?php if (strlen($data['title']) > 0): ?>
					<span><?php echo $data['title'] ?></span>
				<?php endif ?>

				<?php if (strlen($data['desc']) > 0): ?>
					<p><?php echo $data['desc'] ?></p>
				<?php endif ?>

			</div>
		</div>

		<div class="row">

		<?php
			$args = [
				'post_type' => $data['post_type'],
				'posts_per_page' => $data['count_rows'],
				'orderby' => 'rand',
			];
			$query = new WP_Query($args);
			if( $query->have_posts() ){
				while( $query->have_posts() ){ $query->the_post();
					$delay_wow = rand ( 1, 9 );
					$id = get_the_id();
					$cats = wp_get_object_terms( $id, 'positions' );
					$cat_str = '';
					foreach ($cats as $cat) {
						$cat_str .= $cat->name . " ";
					}
				?>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".<?php echo $delay_wow; ?>s">
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
				}
				wp_reset_postdata(); // сбрасываем переменную $post
			} 
			else //echo 'Записей нет.';
		?>
		</div>
	</div>

</section>

