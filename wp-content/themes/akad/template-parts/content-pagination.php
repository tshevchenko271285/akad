<!-- start pagination -->
<div class="pages_pagination">
	
	<a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" class="all"><i class="icon ion-grid"></i></a>
	<?php if ( isset(get_previous_post()->guid) ): ?>
		<a href="<?php echo get_previous_post()->guid; ?>" class="prev"><i class="icon ion-arrow-left-c"></i></a>
	<?php else : ?>
		<a class="prev" style="opacity: 0.5"><i class="icon ion-arrow-left-c"></i></a>
	<?php endif ?>		
	<?php if ( isset(get_next_post()->guid) ): ?>
		<a href="<?php echo get_next_post()->guid; ?>" class="next"><i class="icon ion-arrow-right-c"></i></a>
	<?php else : ?>
		<a class="next" style="opacity: 0.5"><i class="icon ion-arrow-right-c"></i></a>
	<?php endif ?>
	
</div>
<!-- end pagination -->