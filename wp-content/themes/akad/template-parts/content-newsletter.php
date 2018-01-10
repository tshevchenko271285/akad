<?php 
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
$newsletter_form = cost_es_cls_widget::load_subscription( ['es_name' => "NO", 'es_desc' => "", 'es_group' => "" ]);
$newsletter_texts = get_field('newsletter')[0];
?>
<!-- newsletter -->
<section class="green-section wow fadeInUp" style="padding:50px 0">
	<div class="container">
		<div class="col-md-6 col-sm-12">
			<div class="row">
				<span class="white-text montserrat-text uppercase" style="font-size:30px;display:block;">
					<?php echo $newsletter_texts['left_title']; ?>
				</span>
				<a href="#" class="btn white" style="margin-top:30px"><span><?php echo $newsletter_texts['left_button_text']; ?></span></a>
			</div>
		</div>

		<div class="col-md-6 col-sm-12">
			<div class="row">
				<div class="white-section" style="padding:20px">
					<span class="montserrat-text uppercase" style="font-size:24px"><?php echo $newsletter_texts['newsletter_title']; ?></span>
					<p>
						<?php echo $newsletter_texts['newsletter_text']; ?>
					</p>
					<?php echo $newsletter_form; ?>
				</div>
			</div>
		</div>
	</div>
</section>