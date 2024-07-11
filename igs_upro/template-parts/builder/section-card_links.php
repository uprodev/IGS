<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="card-link<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="top text-center">

					<?php if ($subtitle): ?>
						<h6 class="sub-title text-center"><?= $subtitle ?></h6>
					<?php endif ?>

					<?php if ($title): ?>
						<h2 class="text-center"><?= $title ?></h2>
					<?php endif ?>

				</div>

				<?php if (is_array($cards) && checkArrayForValues($cards)): ?>
				<div class="content d-flex justify-content-between flex-wrap">

					<?php foreach ($cards as $item): ?>
						<div class="item<?php if(!$item['link']) echo ' no-link' ?>">
							<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>

								<?php if ($item['image_desktop'] || $item['image_mobile']): ?>
									<figure>

										<?php if ($item['image_desktop']): ?>
											<?= wp_get_attachment_image($item['image_desktop']['ID'], 'full') ?>
										<?php endif ?>

										<?php if ($image = $item['image_mobile'] ?: $item['image_desktop']): ?>
											<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img-mob')) ?>
										<?php endif ?>

									</figure>
								<?php endif ?>
								
								<div class="text">

									<?php if ($item['title']): ?>
										<h6><?= $item['title'] ?></h6>
									<?php endif ?>

									<?= $item['text'] ?>

									<?php if ($item['link']): ?>
										<div class="arrow">
											<i class="fa-solid fa-arrow-right"></i>
										</div>
									<?php endif ?>

								</div>
							</a>
						</div>
					<?php endforeach ?>
					
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>