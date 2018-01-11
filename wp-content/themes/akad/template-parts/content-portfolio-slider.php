<section>
	<div class="container">
		<div class="project_images">

			<ul class="slides">
				<?php 
				if ( !is_array(empty($slides_url) ) ) {
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