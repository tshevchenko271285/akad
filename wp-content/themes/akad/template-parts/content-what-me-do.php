<?php 
	$data['title'] = get_sub_field('title') ? get_sub_field('title') : '';
	$data['desc'] = get_sub_field('desc') ? get_sub_field('desc') : '';
	$data['text'] = get_sub_field('text') ? get_sub_field('text') : '';
	$data['img_url'] = get_sub_field('image') ? wp_get_attachment_image_url( get_sub_field('image'), 'large' ) : false;
	$data['lists'] = get_sub_field('lists') ? get_sub_field('lists') : false;
?>

	<!-- WHAT WE DO -->
	<section>
		<div class="container">
			<div class="row">
				<div class="section-title">
					<?php if ( strlen($data['title']) ): ?>
						<span><?php echo $data['title'] ?></span>
					<?php endif ?>
					<?php if ( strlen($data['desc']) ): ?>
						<p><?php echo $data['desc'] ?></p>
					<?php endif ?>
					
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 wow fadeInUp">

					<?php if ( strlen($data['text'])): ?>

						<p style="margin-bottom:30px"><?php echo $data['text'] ?></p>

					<?php endif ?>

					<?php if ( is_array( $data['lists'] ) ):

						$col = 12 / count($data['lists'] );

						foreach ($data['lists'] as $list): ?>

							<div class="col-md-<?php echo $col; ?>">
								<div class="row">

									<?php if ( is_array( $list['list'] ) ): ?>

									<ul class="list">

										<?php foreach ($list['list'] as $list_item): ?>

											<?php if ( strlen($list_item['text']) ): ?>

												<li><?php echo $list_item['text']; ?></li>

											<?php endif ?>

										<?php endforeach ?>

									</ul>

									<?php endif ?>

								</div>
							</div>

						<?php endforeach;

					endif; ?>
					
				</div>

				<?php if ($data['img_url']): ?>

					<div class="col-md-6 wow fadeInUp" data-wow-delay=".1s">
						<img src="<?php echo $data['img_url']; ?>" alt="img" style="width:100%">
					</div>

				<?php endif ?>

			</div><!-- end row -->
		</div><!-- end container -->
	</section>