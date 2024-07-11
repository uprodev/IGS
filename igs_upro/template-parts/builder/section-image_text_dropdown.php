<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="img-text img-text-normal only-img accordion-block<?php if($background_color == 'Light blue') echo ' bg-l-blue'; if($image_position == 'Left') echo ' img-text-normal-revers' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap">

					<?php if ($image): ?>
						<figure class="col-lg-6 col-12">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</figure>
					<?php endif ?>

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

							<?php if (is_array($dropdown_items) && checkArrayForValues($dropdown_items)): ?>
							<ul class="accordion">

								<?php foreach ($dropdown_items as $item): ?>
									<li class="accordion-item">
										<div class="accordion-thumb">

											<?php if ($item['icon']): ?>
												<div class="icon-wrap">
													<i class="<?= $item['icon'] ?>"></i>
												</div>
											<?php endif ?>
											
											<?php if ($item['title']): ?>
												<p><?= $item['title'] ?></p>
											<?php endif ?>
											
											<div class="after"><i class="fa-light fa-plus"></i></div>
										</div>

										<?php if ($item['content']): ?>
											<div class="accordion-panel">
												<div class="wrap"><?= $item['content'] ?></div>
											</div>
										<?php endif ?>

									</li>
								<?php endforeach ?>
								
							</ul>
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