<?php 
	$data['text'] = get_sub_field('text') ? get_sub_field('text') : '';
	$data['text_button'] = get_sub_field('text-btn') ? get_sub_field('text-btn') : '';
	$data['url_button'] = get_sub_field('url-btn') ? get_sub_field('url-btn') : '#';
?>	
<!-- light gray section -->
<div class="container">
	<div class="light-gray-section wow fadeInUp" style="padding:15px 30px;">
		<div class="row">
			<p class="italic" style="float:left;line-height:50px;margin:0">
				<?php echo $data['text']; ?>
			</p>
			<a href="<?php echo $data['url_button']; ?>" class="btn green" style="float:right"><span><?php echo $data['text_button']; ?></span></a>
		</div>
	</div>
</div>
