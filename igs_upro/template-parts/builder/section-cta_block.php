<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="cta-block cta-big<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap">

					<?php if ($image_desktop || $image_mobile): ?>
						<figure>

							<?php if ($image_desktop): ?>
								<?= wp_get_attachment_image($image_desktop['ID'], 'full') ?>
							<?php endif ?>

							<?php if ($image = $image_mobile ?: $image_desktop): ?>
								<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img-mob')) ?>
							<?php endif ?>

						</figure>
					<?php endif ?>

					<div class="text">

						<?php if ($subtitle): ?>
							<h6 class="sub-title sub-title-white"><?= $subtitle ?></h6>
						<?php endif ?>

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>

						<?php if ($description): ?>
							<div class="text-wrap">
								<?= $description ?>
							</div>
						<?php endif ?>

						<?php if ($button || $link): ?>
							<div class="btn-wrap d-flex align-items-center flex-wrap">

								<?php if ($button): ?>
									<a href="<?= $button['url'] ?>" class="btn-default btn-white"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								<?php endif ?>

								<?php if ($link): ?>
									<a href="<?= $link['url'] ?>" class="link-tel d-flex"<?php if($link['target']) echo ' target="_blank"' ?>>

										<?php if ($link_icon): ?>
											<i class="<?= $link_icon ?>"></i>
										<?php endif ?>

										<?= $link['title'] ?>
										
									</a>
								<?php endif ?>

							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>