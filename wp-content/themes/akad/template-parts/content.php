<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akad
 */
$posts_field = get_field('two_columns');
?>
<div class="single_post">
	<div class="post_media">
		<?php akad_post_thumbnail(); ?>
	</div>
	<div class="post_title">
		<h4 class="montserrat-text uppercase"><?php the_title(); ?></h4>
		<span class="post_date">Date : <?php echo get_the_date( 'Y-n-d' ); ?></span>
	</div>
	<?php the_content(); ?>

	<?php if ( isset( $posts_field ) ): ?>

		<?php foreach ( $posts_field as $row ): ?>
			
		<div class="row">
			<div class="col-md-6">
				<?php if ($row['image']): ?>
					<img src="<?php echo $row['image']['url'] ?>" alt="<?php echo $row['image']['alt'] ?>">
				<?php endif ?>
			</div>
			<div class="col-md-6">
				<?php echo $row['content']; ?>
			</div>
		</div>				

		<?php endforeach ?>

	<?php endif ?>

</div>