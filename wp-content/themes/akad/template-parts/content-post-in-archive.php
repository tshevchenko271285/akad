<!-- blog post -->
<div class="blog_post wow fadeInUp">
	<div class="post_media">
		<?php the_post_thumbnail(array(840, 500)); ?>
	</div>
	<div class="post_info">
		<div class="post_date montserrat-text uppercase">
			<?php echo get_the_date( 'F d, Y' ); ?>
		</div>
		<i class="icon ion-chatbox-working"></i>
		<span><?php echo get_comments_number(); ?></span>
		<i class="icon ion-ios-heart"></i>
		<span>15</span>
	</div>
	<p>
		<?php echo wp_trim_words( get_the_content(), 55, '' ); ?>
	</p>
	<a href="<?php the_permalink(); ?>" class="link montserrat-text uppercase">continue reading <i class="icon ion-arrow-right-c"></i></a>
</div>
<!-- blog post -->