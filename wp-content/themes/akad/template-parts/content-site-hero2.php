<?php
/**
 * Template part for displaying Slider Site Heroes
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

/**
 *	Prepare data
 */
$banner_image = get_field('banner_image', 'option') ? ' style="background-image: url(' . get_field('banner_image', 'option') . ')" ' : '';
?>
<!-- HERO SECTION  -->
<div class="site-hero_2" <?php echo $banner_image; ?> >
	<div class="page-title">
		<div class="big-title montserrat-text uppercase"><?php the_title(); ?></div>
		<div class="small-title montserrat-text uppercase">
			<?php if( function_exists('breadcrumbs') ) echo breadcrumbs(); ?>
		</div>
	</div>
</div>