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
$services = get_field('services')[0];
$image = wp_get_attachment_image( $services['image'], array(470, 500) );
?>
<!-- WHY CHOOSE US -->
<section class="services">
	<div class="container">
		<div class="row">
			<div class="section-title">
				<span><?php echo $services['title']; ?></span>
				<p><?php echo $services['description']; ?></p>
			</div>
		</div>

		<div class="col-md-7 col-sm-12 services-left wow fadeInUp">
			<div class="row" style="margin-bottom:50px">
			<?php 
				if (is_array($services['service'])):
				//shuffle($services['service']);
				$repeater = 0;
				foreach( $services['service'] as $service ) { 
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
				if( strlen($image) > 0 ) {
					echo $image; 
				}
				?>
			</div>
		</div>

	</div>
</section>