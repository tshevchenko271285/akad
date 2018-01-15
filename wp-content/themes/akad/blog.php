<?php
/*
Template Name: Blog
*/
get_header();
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'site-hero2' );
	?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-12">
				<?php
					$query = new WP_Query('post_type=post&posts_per_page=1');
					if( $query->have_posts() ){
						while( $query->have_posts() ){ $query->the_post();
							get_template_part( 'template-parts/content', 'post-in-archive' ); 
						}
						?>
						<pre><?php var_dump( get_the_posts_pagination() ) ?></pre>
						<pre><?php var_dump( paginate_links() ) ?></pre>
						<pre><?php var_dump( get_next_posts_link() ) ?></pre>
						<pre><?php var_dump( get_pagenum_link() ) ?></pre>
						<pre><?php var_dump( next_posts_link() ) ?></pre>
						<?
						wp_reset_postdata(); // сбрасываем переменную $post
					} 
					else echo 'Записей нет.';
				?>
				
				<!-- pagination -->
				<div class="blog_pagination wow fadeInUp">
					<a href="" class="page">
						<i class="icon ion-arrow-left-c prev"></i>
						<span>previous</span>
					</a>
					<span class="divisor">/</span>
					<a href="" class="page">
						<span>next</span>
						<i class="icon ion-arrow-right-c next"></i>
					</a>
				</div>
			</div><!-- end col -->
			
			<div class="col-md-3"> <!-- start sidebar -->
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div> <!-- end sidebar -->

		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php
	
	


endwhile; // End of the loop.
?>

<?php
get_footer();
?>
