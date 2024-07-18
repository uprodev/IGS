<a href="<?php the_permalink() ?>" class="all"></a>
<figure>

	<?php 
	$post_type = get_post_type($args['post_id']);
	$label = '';
	switch ($post_type) {
		case 'event':
		$label = 'Event';
		break;
		case 'download':
		$label = 'Download';
		break;

		default:
		$labels = wp_get_object_terms($args['post_id'], $post_type . '_label');
		if($labels) $label = $labels[0]->name;
		break;
	}
	?>

	<?php if ($label): ?>
		<h6 class="label-bg"><?= $label ?></h6>
	<?php endif ?>

	<?= get_the_post_thumbnail($args['post_id'], 'full') ?>

</figure>
<div class="text">

	<?php $categories = wp_get_object_terms($args['post_id'], $post_type . '_cat'); ?>

	<h6 class="sub-title">

		<?php if ($categories): ?>
			<span><?= $categories[0]->name ?></span>
		<?php endif ?>

		<?php if ($field = get_field('date', $args['post_id'])): ?>
			<b>|</b> <span><?= $field ?></span>
		<?php endif ?>

	</h6>

	<h5><?php the_title() ?></h5>

	<?php 
	switch ($post_type) {
		case 'download':
		$link_url = '';
		$link_title = '';
		if ($link = get_field('link', $args['post_id'])) {
			$link_url = $link['url'];
			$link_title = $link['title'];
		}
		break;

		default:
		$link_url = get_permalink($args['post_id']);
		$link_title = get_field('card_link_text', $args['post_id']);
		break;
	}
	?>

	<?php if ($link_url && $link_title): ?>
		<div class="link-wrap">
			<a href="<?= $link_url ?>"><?= $link_title ?></a>
		</div>
	<?php endif ?>

</div>