<?php 
$pagination = get_posts_nav_link(array(
	'sep' => '<span class="divisor"> / </span>',
	'prelabel' => '<span class="page">
					<i class="icon ion-arrow-left-c prev"></i>
					<span>previous</span>
					</span>',
	'nxtlabel' => '<span class="page">
						<span>next</span>
						<i class="icon ion-arrow-right-c next"></i>
					</span>'
)); ?>	

<div class="blog_pagination wow fadeInUp">
	<?php echo $pagination; ?>
</div>