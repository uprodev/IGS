<div class="item">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<?php the_post_thumbnail('full') ?>
		</figure>
	<?php endif ?>
	
	<div class="text">
		<h5><?php the_title() ?></h5>
		<div class="text-wrap">
			<?php the_excerpt() ?>
		</div>
		<div class="link-wrap">
			<a href="<?php the_permalink() ?>"><?php _e('Bekijk vacature', 'IGS') ?></a>
		</div>
	</div>
</div>