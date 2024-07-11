<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($cards) && checkArrayForValues($cards)): ?>
	<section class="card-links-section<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">

				<?php if ($title): ?>
					<h2 class="text-center mb-5"><?= $title ?></h2>
				<?php endif ?>

				<div class="content d-flex flex-wrap">

					<?php foreach ($cards as $item): ?>
						<div class="item<?php if(!$item['link']) echo ' no-link' ?>">

							<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>

								<?php if ($item['image']): ?>
									<figure>
										<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
									</figure>
								<?php endif ?>

								<div class="text">

									<?php if ($item['title']): ?>
										<h5><?= $item['title'] ?></h5>
									<?php endif ?>

									<?= $item['description'] ?>

									<?php if ($item['link']): ?>
										<div class="arrow">
											<i class="fa-light fa-arrow-right"></i>
										</div>
									<?php endif ?>

								</div>
							</a>
						</div>
					<?php endforeach ?>
					
				</div>

				<?php if ($button): ?>
					<div class="btn-wrap">
						<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>