<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner precision-banner lading-banner<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>

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
				<div class="content d-flex justify-content-between flex-wrap w-100">
					<div class="text col-lg-6 col-12">

						<?php if ($label): ?>
							<h6 class="label"><?= $label ?></h6>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>

						<?php if ($description): ?>
							<div class="text-wrap"><?= $description ?></div>
						<?php endif ?>

						<?php if ($button): ?>
							<div class="btn-wrap d-flex flex-wrap">
								<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>

					<?php if (is_array($quick_links) && checkArrayForValues($quick_links)): ?>
					<figure class="col-lg-6 col-12">
						<div class="list-link-wrap">

							<?php if ($quick_links_title): ?>
								<h6><?= $quick_links_title ?></h6>
							<?php endif ?>

							<ul class="list-link">

								<?php foreach ($quick_links as $item): ?>
									<?php if ($item['link']): ?>
										<li>
											<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><i class="fa-solid fa-arrow-right"></i> <?= $item['link']['title'] ?></a>
										</li>
									<?php endif ?>
								<?php endforeach ?>
								
							</ul>
						</div>
					</figure>
				<?php endif ?>
				
			</div>
		</div>
	</div>

</section>

<?php endif; ?>