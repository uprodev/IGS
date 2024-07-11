<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner text-banner"<?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if ($background_image_desktop || $background_image_mobile): ?>
			<div class="bg">

				<?php if ($background_image_desktop): ?>
					<?= wp_get_attachment_image($background_image_desktop['ID'], 'full', false, array('class' => 'img')) ?>
				<?php endif ?>

				<?php if ($image = $background_image_mobile ?: $background_image_desktop): ?>
					<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img img-mob')) ?>
				<?php endif ?>

			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content">

					<?php 
					$post_id = get_the_ID();
					$post_type = get_post_type($post_id);

					$default_labels = wp_get_object_terms($post_id, $post_type . '_label');
					$labels = $custom_default_subtitle == 'Default' ? (is_array($default_labels) ? wp_list_pluck($default_labels, 'name') : '') : (is_array($labels) ? wp_list_pluck($labels, 'label') : '');

					$default_categories = wp_get_object_terms($post_id, $post_type . '_cat');
					$categories = $custom_default_subtitle == 'Default' ? (is_array($default_categories) ? wp_list_pluck($default_categories, 'name') : '') : (is_array($categories) ? wp_list_pluck($categories, 'category') : '');

					?>

					<?php if (is_array($labels) || is_array($categories)): ?>
					<ul class="breadcrumb d-flex flex-wrap align-items-center">

						<?php if (is_array($labels)): ?>
							<?php foreach ($labels as $item): ?>
								<li><a href="#" class="no-link"><?= $item ?></a></li>
							<?php endforeach ?>
						<?php endif ?>

						<?php if (is_array($categories)): ?>
							<?php foreach ($categories as $item): ?>
								<li><?= $item ?></li>
							<?php endforeach ?>
						<?php endif ?>

					</ul>
				<?php endif ?>

				<?php if ($title): ?>
					<h1><?= $title ?></h1>
				<?php endif ?>
				
			</div>
		</div>
	</div>
</section>

<?php endif; ?>