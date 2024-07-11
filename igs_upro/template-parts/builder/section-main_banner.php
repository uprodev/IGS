<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	switch ($banner_height) {
		case 'Normal':
		$height_class = ' h-normal';
		break;
		case 'Small':
		$height_class = ' h-small';
		break;
		
		default:
		$height_class = '';
		break;
	}
	?>

	<section class="home-banner precision-banner<?= $height_class ?>"<?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if ($image_desktop || $image_mobile): ?>
			<div class="bg">

				<?php if ($image_desktop): ?>
					<?= wp_get_attachment_image($image_desktop['ID'], 'full', 'full', false, array('class' => 'img')) ?>
				<?php endif ?>

				<?php if ($image = $image_mobile ?: $image_desktop): ?>
					<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img img-mob')) ?>
				<?php endif ?>

			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content">

					<?php if ($label): ?>
						<h6 class="label"><?= $label ?></h6>
					<?php endif ?>

					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>

					<?php if ($description): ?>
						<div class="text-wrap"><?= $description ?></div>
					<?php endif ?>

					<?php if ($button || $link): ?>
						<div class="btn-wrap d-flex align-items-center flex-wrap">

							<?php if ($button): ?>
								<a href="<?= $button['url'] ?>" class="btn-default btn-white"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							<?php endif ?>

							<?php if ($link): ?>
								<a href="<?= $link['url'] ?>" class="link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
							<?php endif ?>

						</div>
					<?php endif ?>

				</div>

			</div>

		</div>

		<?php if ($optional_icon): ?>
			<div class="icon-wrap">
				<i class="<?= $optional_icon ?>"></i>
			</div>
		<?php endif ?>

	</section>

	<?php endif; ?>