<?php 
	$slides_url = get_field('slides');
	get_template_part( 'template-parts/content', 'site-hero2' );
?>
	<section>
		<div class="container">
			<div class="project_images">

				<ul class="slides">
					<?php 
					if ( !is_array($slides_url) ) {
						the_post_thumbnail('single-portfolio');
					} else {
						foreach ($slides_url as $slide) { ?>
							<li><img src="<?php echo $slide['image']; ?>" /></li>
						<?php } ?>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span><?php the_title(); ?></span>
					<p><?php the_excerpt(); ?></p>
				</div>
			</div>

			<div class="row">
				<!-- start content -->
				<div class="col-md-9 wow fadeInUp">
					<?php the_content(); ?>
<pre>
	<?php
		var_dump(get_post_type_archive_link( 'portfolio' ) );
	?>
</pre>
				</div>
				<!-- end content -->

				<!-- start sidebar -->
				<div class="col-md-3 wow fadeInUp" data-wow-delay=".1s">
					<ul class="list">
						<li>Web design</li>
						<li>Front end development</li>
						<li>Back end development</li>
						<li>SEO</li>
					</ul>
					<h5 class="uppercase montserrat-text" style="margin-top:30px;">share</h5>
					<ul class="social-icons" style="margin-top:20px;">
						<li><a href="javasript:void(0);" data-social="fb"><i class="icon ion-social-facebook"></i></a></li>
						<li><a href="javasript:void(0);" data-social="tw"><i class="icon ion-social-twitter"></i></a></li>
						<li><a href="javasript:void(0);" data-social="ln"><i class="icon ion-social-linkedin"></i></a></li>
						<li><a href="javasript:void(0);" data-social="pt"><i class="icon ion-social-pinterest"></i></a></li>
					</ul>
				</div>
				<!-- end sidebar -->

			</div>

			<!-- start pagination -->
			<div class="pages_pagination">
				<a href="portfolio-1.html" class="all"><i class="icon ion-grid"></i></a>
				<a href="<?php echo get_next_post()->guid; ?>" class="prev"><i class="icon ion-arrow-left-c"></i></a>
				<a href="<?php echo get_previous_post()->guid; ?>" class="next"><i class="icon ion-arrow-right-c"></i></a>
			</div>
			<!-- end pagination -->

			<!-- start related projects -->
			<h5 class="montserrat-text uppercase" style="margin-bottom:50px">related projects</h5>
			<div class="row">
				<div class="related_projects">
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="" class="portfolio_item wow fadeInUp">
							<img src="assets/img/work-1.jpg" alt="image">
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span>Brave man</span>
									<em>photography</em>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="" class="portfolio_item wow fadeInUp" data-wow-delay=".1s">
							<img src="assets/img/work-1.jpg" alt="image">
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span>spider man</span>
									<em>fashion</em>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="" class="portfolio_item wow fadeInUp" data-wow-delay=".2s">
							<img src="assets/img/work-1.jpg" alt="image">
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span>bat man</span>
									<em>web design</em>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="" class="portfolio_item wow fadeInUp" data-wow-delay=".3s">
							<img src="assets/img/work-1.jpg" alt="image">
							<div class="portfolio_item_hover">
								<div class="item_info">
									<span>iron man</span>
									<em>graphic</em>
								</div>
							</div>
						</a>
					</div>
				</div><!-- end related projects -->
			</div><!-- end row -->
			<!-- end related projects -->

		</div><!-- end container -->
	</section>


	<!-- light gray section -->
	<div class="container">
		<div class="light-gray-section wow fadeInUp" style="padding:15px 30px">
			<div class="row">
				<p class="italic" style="float:left;line-height:50px;margin:0">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
				</p>
				<a href="" class="btn green" style="float:right"><span>read more</span></a>
			</div>
		</div>
	</div>



	<!-- newsletter -->
	<section class="green-section wow fadeInUp" style="padding:50px 0">
		<div class="container">
			<div class="col-md-6 col-sm-12">
				<div class="row">
					<span class="white-text montserrat-text uppercase" style="font-size:30px;display:block;">
						you think we're cool? let's work together
					</span>
					<a href="#" class="btn white" style="margin-top:30px"><span>get in touch</span></a>
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<div class="row">
					<div class="white-section" style="padding:20px">
						<span class="montserrat-text uppercase" style="font-size:24px">stay informed with our newsletter</span>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<form action="#" method="post">
							<div class="input_1">
								<input type="text" name="email">
								<span>your email</span>
							</div>
							<button type="submit" class="btn green" style="margin-top:20px"><span>send</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript" charset="utf-8">
$(window).load(function() {
	new WOW().init();
	// initialize flexslider
	$('.project_images').flexslider({
		directionNav : false,
		controlNav : false
	});

	// initialize social buttons
	$("[data-social]").socialButtons();
});
</script>