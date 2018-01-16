<?php
/**
 * Template part for displaying 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */

/**
 *	Prepare data
 */

// var_dump( is_archive() );
// var_dump( is_category() );
// var_dump( is_page() );
// var_dump( is_single() );
// var_dump( is_singular() );
// var_dump( is_preview() );
// var_dump( is_front_page() );
// var_dump( is_embed() );
// var_dump( is_attachment() );
$banner_image = get_field('banner_image', 'option') ? ' style="background-image: url(' . get_field('banner_image', 'option') . ')" ' : '';
$title = '';

if( is_category() ) {
	$title = single_cat_title('', 0);
}
elseif( is_archive() ) {
	$title = get_the_archive_title();
}
else {
	$title = get_the_title( get_queried_object_id() );
}
?>
<!-- HERO SECTION  -->
<div class="site-hero_2" <?php echo $banner_image; ?> >
	<div class="page-title">
		<div class="big-title montserrat-text uppercase"><?php echo $title; ?></div>
		<div class="small-title montserrat-text uppercase">
			<?php if( function_exists('breadcrumbs') ) echo urldecode( breadcrumbs() ); ?>
		</div>
	</div>
</div>