<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner precision-banner career-banner bg-gradient-blue">

		<?php if ($image_desktop || $image_mobile): ?>
			<div class="bg">

				<?php if ($image_desktop): ?>
					<?= wp_get_attachment_image($image_desktop['ID'], 'full', false, array('class' => 'img')) ?>
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

					<?php 
					$terms = get_terms( [
						'taxonomy' => 'vacancy_language',
						'hide_empty' => false,
					] ); 
					?>

					<?php if ($terms): ?>
						<div class="btn-wrap d-flex flex-wrap">

							<?php foreach ($terms as $index => $term): ?>
								<a href="#" class="btn-default btn-white btn-flag btn-border" data-value="<?= $term->term_id ?>">

									<?php if ($field = get_field('flag', 'term_' . $term->term_id)): ?>
										<span>
											<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
												<img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
											<?php else: ?>
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											<?php endif ?>
										</span>
									<?php endif ?>
									
									<?= $term->name ?>
								</a>
							<?php endforeach ?>


						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>

	</section>

	<?php endif; ?>