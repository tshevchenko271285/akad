<?php 
	$data['title'] = get_sub_field('title') ? get_sub_field('title') : '';
	$data['desc'] = get_sub_field('desc') ? get_sub_field('desc') : '';
	$data['gallery'] = get_sub_field('gallery') ? get_sub_field('gallery') : false;
	$data['max_slides'] = get_sub_field('max_slides') ? get_sub_field('max_slides') : 3;
	$data['post_type'] = 'testimonials';
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
				<div class="col-md-6">
					<div class="testimonials wow fadeInUp">
						<ul class="slides">
						<?php
						$args = [
							'post_type' => $data['post_type'],
							'posts_per_page' => $data['max_slides'],
						];
						$query = new WP_Query($args);
						if( $query->have_posts() ){
							while( $query->have_posts() ){ $query->the_post();
							?>
							<li class="testimonials_single">
								<div class="author_pic">
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								</div>
								<?php the_content(); ?>
								<div class="author_name"><?php the_title(); ?></div>
							</li>
							<?php
							}
							wp_reset_postdata(); // сбрасываем переменную $post
						} 
						else //echo 'Записей нет.';
						?>
						</ul>
					</div>
				</div>

				<div class="col-md-6 clients">
					<div class="row">
					<?php foreach ( $data['gallery'] as $key => $img): ?>
						<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".1s">
							<div class="clients_single">
								<a href="<?php echo $img['url']; ?>">
									<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="client logo">
								</a>
							</div>
						</div>
					<?php if($key === 5) break; endforeach ?>
					</div>
				</div>
			</div>	
		</div>
	</section>