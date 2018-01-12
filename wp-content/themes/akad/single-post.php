<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package akad
 */

get_header(); 
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'site-hero2' );
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<div class="single_post">
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					</div>
					<?php get_template_part( 'template-parts/content', 'pagination' ); ?>
				</div><!-- end col -->
				
				<div class="col-md-3"> <!-- start sidebar -->
					<div class="sidebar">
						<?php get_sidebar(); ?>
						
<!-- 						<div class="widget">
	<div class="input_2">
		<input type="text" placeholder="search...">
		<button type="submit"><i class="icon ion-search"></i></button>
	</div>
</div>
<div class="widget">
	<div class="widget_title">posts</div>
	<div class="tab">
		<nav>
			<a href="">popular</a>
			<a href="">latest</a>
			<div class="bottom-line"></div>
		</nav>
		<div class="tab_single shown">
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href="" class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href=""  class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href=""  class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
		</div>
		<div class="tab_single">
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href=""  class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href=""  class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
			<div class="related_post">
				<div class="thumb"><img src="assets/img/thumb.jpg" alt="image"></div>
				<a href=""  class="post_title montserrat-text uppercase">Magna mollis ultricies</a>
				<div class="post_date">3th october 2015</div>
			</div>
		</div>
	</div>
</div>

<div class="widget wow fadeInUp">
	<div class="widget_title">categories</div>
	<ul class="list_2">
		<li><a href="">Business	<span>15</span></a></li>
		<li><a href="">Photography	<span>22</span></a></li>
		<li><a href="">Journal	<span>27</span></a></li>
		<li><a href="">Web development	<span>30</span></a></li>
	</ul>
</div>

<div class="widget wow fadeInUp">
	<div class="widget_title">tags cloud</div>
	<ul class="tags">
		<li><a href="">css</a></li>
		<li><a href="">html</a></li>
		<li><a href="">javascript</a></li>
		<li><a href="">jquery</a></li>
		<li><a href="">bootstrap</a></li>
		<li><a href="">web development</a></li>
		<li><a href="">ui &amp; ux</a></li>
	</ul>
</div> -->

	<!-- 					<div class="widget wow fadeInUp">
		<div class="widget_title">instagram</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
		<div class="thumb" style="margin-bottom:15px">
			<a href=""><img src="assets/img/thumb.jpg" alt="thumb"></a>
		</div>
	</div>
	
	<div class="widget wow fadeInUp">
		<div class="widget_title">archives</div>
		<ul class="list_2">
			<li><a href="">Jan-Feb 2015	<span>15</span></a></li>
			<li><a href="">Feb-Mar 2015	<span>22</span></a></li>
			<li><a href="">Mar-Apr 2015	<span>27</span></a></li>
			<li><a href="">Apr-May 2015	<span>30</span></a></li>
		</ul>
	</div> -->

					</div>
				</div> <!-- end sidebar -->

			</div><!-- end row -->
		</div><!-- end container -->
	</section>

	<?php get_template_part( 'template-parts/content', 'newsletter' ); ?>
<?php
			




		endwhile; // End of the loop.
		?>

<?php
//get_sidebar();
get_footer();
