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
$heroes = get_field('site_hero')[0];
?>
<!-- HERO SECTION  -->
<div <?php echo $heroes['background'] ? 'style="backgound-image: url('. $heroes['background'] .')"' : ''; ?>
	 class="site-hero">
	 <?php if( is_array($heroes['slider']) ) :?>
		<ul class="slides">
			<?php foreach($heroes['slider'] as $slide) { ?>
			<li>
				<div><span class="small-title uppercase montserrat-text"><?php echo $slide['slug'] ?></span></div>
				<div class="big-title uppercase montserrat-text"><?php echo $slide['title'] ?></div>
				<p><?php echo $slide['desc'] ?></p>
			</li>
			<?php } ?>
		</ul>
	<?php endif; ?>
</div>