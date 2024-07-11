<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="img-text img-text-normal<?php if($image_position == 'Right') echo ' img-text-normal-revers'; if($background_color == 'Light blue') echo ' bg-l-blue'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap align-items-center">

					<?php if($images): ?>

						<figure class="col-lg-6 col-12">

							<?php foreach($images as $index => $image): ?>

								<?php if ($index == 1): ?>
									<div class="small-img">
									<?php endif ?>

									<?= wp_get_attachment_image($image['ID'], 'full') ?>

									<?php if ($index == 1): ?>
									</div>
								<?php endif ?>

							<?php endforeach; ?>

						</figure>

					<?php endif; ?>

					<div class="text col-lg-6 col-12">

						<?php if ($subtitle): ?>
							<h6 class="sub-title"><?= $subtitle ?></h6>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?php if ($description): ?>
							<div class="text-wrap"><?= $description ?></div>
						<?php endif ?>

						<?php if ($button || $link): ?>
							<div class="btn-wrap d-flex align-items-center flex-wrap">

								<?php if ($button): ?>
									<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								<?php endif ?>

								<?php if ($link): ?>
									<a href="<?= $link['url'] ?>" class="link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
								<?php endif ?>

							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>