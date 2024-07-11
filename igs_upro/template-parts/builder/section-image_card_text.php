<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="img-text<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap align-items-center">
					<figure class="col-lg-6 col-12">

						<?php if ($image): ?>
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						<?php endif ?>

						<?php if (is_array($card) && checkArrayForValues($card)): ?>
						<div class="link-block<?php if(!$card['link']) echo ' no-link' ?>">
							<a href="<?= $card['link'] ? $card['link']['url'] : '' ?>"<?php if($card['link'] && $card['link']['target']) echo ' target="_blank"' ?>>

								<?php if ($card['title']): ?>
									<h6><?= $card['title'] ?></h6>
								<?php endif ?>

								<?= $card['text'] ?>

								<?php if ($card['link']): ?>
									<div class="arrow">
										<i class="fa-solid fa-arrow-right"></i>
									</div>
								<?php endif ?>

							</a>
						</div>
					<?php endif ?>

				</figure>
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