<?php 
	$data['benefits'] = get_sub_field('benefits') ? get_sub_field('benefits') : false;
?>
<section>
	<div class="container">
		<div class="row">
			<?php if ( is_array($data['benefits']) ): ?>

				<?php foreach ( $data['benefits'] as $benefit ): ?>
					
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp">
						<div class="benefits_1_single">
							<i class="icon <?php echo $benefit['icon']; ?>"></i>
							<div class="title montserrat-text uppercase">
								<?php echo $benefit['title']; ?>
							</div>
							<p><?php echo $benefit['text']; ?></p>
						</div>
					</div>

				<?php endforeach ?>

			<?php endif ?>
		</div>
	</div>
</section>