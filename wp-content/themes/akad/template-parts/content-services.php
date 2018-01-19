<?php
/**
 * Template part for displaying HISTORY OF AGENCY Block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
/**
 * Prepare data Services 
 */
$title = get_sub_field('title') ? get_sub_field('title') : '';
$description = get_sub_field('description') ? get_sub_field('description') : '';
$services = get_sub_field('service') ? get_sub_field('service') : false;
$image = get_sub_field('image') ? wp_get_attachment_image( get_sub_field('image'), array(470, 500) ) : false;
?>
<!-- WHY CHOOSE US -->
<section class="services">
	<div class="container">
		<div class="row">
			<div class="section-title">
				<?php if ( $title ): ?>
					<span><?php echo $title; ?></span>
				<?php endif ?>
				<?php if ( $description ): ?>
					<p><?php echo $description; ?></p>
				<?php endif ?>				
			</div>
		</div>

		<div class="col-md-7 col-sm-12 services-left wow fadeInUp">
			<div class="row" style="margin-bottom:50px">
			<?php 
				if (is_array($services)):
				//shuffle($services['service']);
				$repeater = 0;
				foreach( $services as $service ) { 
					$repeater++;
					if( $repeater > 4 ) break;
			?>
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<i class="icon <?php echo $service['icon'] ?>"></i>
						<span class="montserrat-text uppercase service-title"><?php echo $service['title'] ?></span>
						<?php if (is_array($service['list'])): ?>
						<ul>
							<?php foreach ($service['list'] as $list_key => $list_item): ?>
								<li><?php echo $list_item['text']; ?></li>
							<?php endforeach ?>
						</ul>
						<?php endif ?>
					</div>
				</div>
			<?php } ?>
			<?php endif ?>
			</div>
		</div>

		<div class="col-md-5 col-sm-12 services-right wow fadeInUp" data-wow-delay=".1s">
			<div class="row">
				<?php 
				if( strlen($image) ) {
					echo $image; 
				}
				?>
			</div>
		</div>

	</div>
</section>