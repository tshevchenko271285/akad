<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akad
 */
$footer['copytext'] = get_field('footer_copytext', 'options');
$footer['facebook_url'] = get_field('footer_facebook_url', 'options');
$footer['twitter_url'] = get_field('footer_twitter_url', 'options');
$footer['youtube_url'] = get_field('footer_youtube_url', 'options');
$footer['linkedin_url'] = get_field('footer_linkedin_url', 'options');
$footer['pinterest_url'] = get_field('footer_pinterest_url', 'options');
$footer['instagram_url'] = get_field('footer_instagram_url', 'options');

get_template_part( 'template-parts/content', 'newsletter' );

?>
	<!-- FOOTER -->
	<footer class="main-footer wow fadeInUp">
		<div class="container">
			<div class="col-md-8 col-sm-12">
				<div class="row">
					<nav class="footer-nav">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
								'container'       => false,
								'menu_class'      => '',
								'walker'        => new akad_footer_walker_nav_menu
							) );
						?>
					</nav>
				</div>
			</div>
			<div class="col-md-4 col-sm-12" style="text-align:right">
				<div class="row">
					<div class="uppercase gray-text">
						<?php the_field('footer_copytext', 'options'); ?>
					</div>
					<ul class="social-icons" style="margin-top:30px;float:right">
						<?php if( strlen($footer['facebook_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['facebook_url']; ?>"><i class="icon ion-social-facebook"></i></a></li>
						<?php } ?>
						<?php if( strlen($footer['twitter_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['twitter_url']; ?>"><i class="icon ion-social-twitter"></i></a></li>
						<?php } ?>
						<?php if( strlen($footer['youtube_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['youtube_url']; ?>"><i class="icon ion-social-youtube"></i></a></li>
						<?php } ?>
						<?php if( strlen($footer['linkedin_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['linkedin_url']; ?>"><i class="icon ion-social-linkedin"></i></a></li>
						<?php } ?>
						<?php if( strlen($footer['pinterest_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['pinterest_url']; ?>"><i class="icon ion-social-pinterest"></i></a></li>
						<?php } ?>
						<?php if( strlen($footer['instagram_url']) > 0 ) { ?>
							<li><a href="<?php echo $footer['instagram_url']; ?>"><i class="icon ion-social-instagram"></i></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</footer>

<script>
	var template_directory = "<?php echo get_template_directory_uri() ?>";
</script>
<?php wp_footer(); ?>

</body>
</html>
