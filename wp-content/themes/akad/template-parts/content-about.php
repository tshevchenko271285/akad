<?php 
$data['about_block'] = get_sub_field('column');
?>
<?php if ( is_array( $data['about_block'] ) ): ?>
<section>
	<div class="container">
		<div class="row">

			<?php foreach ($data['about_block'] as $column): ?>
				
				<div class="col-md-6">
					<div class="section-title" style="text-align:left;float:left;width:100%;margin-bottom:0">
						<span><?php echo $column['title']; ?></span>
						<p class="montserrat-text uppercase"><?php echo $column['desc']; ?></p>
					</div>

					<p><?php echo $column['text']; ?></p>
				</div>

			<?php endforeach ?>

		</div>
	</div>
</section>
<?php endif ?>