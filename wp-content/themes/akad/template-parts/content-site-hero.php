<?php
/**
 * Template part for displaying Slider Site Heroes
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

/**
 *	Prepare data for Heroes
 */
$image = get_sub_field('background') ? ' style="background-image: url( ' . get_sub_field('background') . ' )" ' : '';
$slider = get_sub_field('slider') ? get_sub_field('slider') : false;
?>
<!-- HERO SECTION  -->
<div <?php echo $image; ?>
	 class="site-hero">
	 <?php if( is_array($slider) ) :?>
		<ul class="slides">
			<?php foreach($slider as $slide) { ?>
			<li>
				<div><span class="small-title uppercase montserrat-text"><?php echo $slide['slug'] ?></span></div>
				<div class="big-title uppercase montserrat-text"><?php echo $slide['title'] ?></div>
				<p><?php echo $slide['desc'] ?></p>
			</li>
			<?php } ?>
		</ul>
	<?php endif; ?>
</div>