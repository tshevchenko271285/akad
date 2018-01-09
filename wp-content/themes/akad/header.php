<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akad
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('animsition'); ?>>

<!-- HEADER  -->
<header class="main-header">
	<div class="container">
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo();?></a>
		</div>

		<div class="menu">
			<!-- desktop navbar -->
			<nav class="desktop-nav">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'       => false,
					'menu_class'      => 'first-level',
					'walker'        => new akad_header_walker_nav_menu
				) );
			?>
			</nav>
			<!-- mobile navbar -->
			<nav class="mobile-nav"></nav>
			<div class="menu-icon">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
		</div>
	</div>
</header>
