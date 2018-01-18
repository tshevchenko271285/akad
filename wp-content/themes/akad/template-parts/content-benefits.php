<?php 
	$data['benefits_block']['title'] = get_sub_field('title') ? get_sub_field('title') : '';
	$data['benefits_block']['desc'] = get_sub_field('desc') ? get_sub_field('desc') : '';
	$data['benefits_block']['benefits'] = get_sub_field('benefits') ? get_sub_field('benefits') : '';
?>
<?php if ( is_array($data['benefits_block']) ): ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="section-title">

					<?php if ( $data['benefits_block']['title'] ): ?>
						<span><?php echo $data['benefits_block']['title']; ?></span>
					<?php endif ?>

					<?php if ($data['benefits_block']['desc']): ?>
						<p><?php echo $data['benefits_block']['desc']; ?></p>
					<?php endif ?>

				</div>
			</div>

		<?php if ( is_array( $data['benefits_block']['benefits'] ) ): ?>
			<div class="row">
			<?php foreach ( $data['benefits_block']['benefits'] as $benefit ): 
				$icon = $benefit['icon'] ? $benefit['icon'] : '';
				$title = $benefit['title'] ? $benefit['title'] : '';
				$text = $benefit['text'] ? $benefit['text'] : '';
				$delay_wow = rand ( 1, 9 );
			?>
				<div class="col-md-4 col-sm-6 col-xs-12 benefits_2_single wow fadeInUp" data-wow-delay=".<?php echo $delay_wow; ?>s">

					<?php if ($icon): ?>
						<i class="icon <?php echo $icon; ?>"></i>
					<?php endif ?>

					<span class="title montserrat-text uppercase"><?php echo $title; ?></span>
					<p><?php echo $text; ?></p>
				</div>

			<?php endforeach ?>
			</div>
<?php endif ?>

		</div>
	</section>

<?php endif ?>