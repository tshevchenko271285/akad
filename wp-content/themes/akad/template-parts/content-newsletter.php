<?php 
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
$newsletter_form = cost_es_cls_widget::load_subscription( ['es_name' => "NO", 'es_desc' => "", 'es_group' => "" ]);
?>
<!-- newsletter -->
<section class="green-section wow fadeInUp" style="padding:50px 0">
	<div class="container">
		<div class="col-md-6 col-sm-12">
			<div class="row">
				<span class="white-text montserrat-text uppercase" style="font-size:30px;display:block;">
					<?php the_field('left_title', 'option'); ?>
				</span>
				<a href="<?php the_field('left_button_link', 'option'); ?>" class="btn white" style="margin-top:30px"><span><?php the_field('left_button_text', 'option'); ?></span></a>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="row">
				<div class="white-section" style="padding:20px">
					<span class="montserrat-text uppercase" style="font-size:24px">
						<?php the_field('newsletter_title', 'option'); ?>
					</span>
					<p>
						<?php the_field('newsletter_text', 'option'); ?>
					</p>
					<?php echo $newsletter_form; ?>
				</div>
			</div>
		</div>
	</div>
</section>