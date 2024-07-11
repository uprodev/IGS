<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="wrap-top">
			<div class="bg">

				<?php if ($desktop_image): ?>
					<?= wp_get_attachment_image($desktop_image['ID'], 'full', false, array('class' => 'img')) ?>
				<?php endif ?>

				<?php if ($image = $mobile_image ?: $desktop_image): ?>
					<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img img-mob')) ?>
				<?php endif ?>
				
				<?php if ($video_image == 'Video' && $desktop_video): ?>
					<iframe width="1501" height="784" src="<?= $desktop_video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<?php endif ?>
				
			</div>
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

						<?php if ($button || $normal_link): ?>
							<div class="btn-wrap d-flex align-items-center flex-wrap">

								<?php if ($button): ?>
									<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
								<?php endif ?>

								<?php if ($normal_link): ?>
									<a href="<?= $normal_link['url'] ?>" class="link"<?php if($normal_link['target']) echo ' target="_blank"' ?>><?= $normal_link['title'] ?></a>
								<?php endif ?>

							</div>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>

		<?php if (is_array($cards) && checkArrayForValues($cards)): ?>
		<div class="bottom">
			<div class="container">
				<div class="row">
					<div class="bottom-content d-lg-flex justify-content-between flex-wrap">

						<?php foreach ($cards as $item): ?>
							<div class="item<?php if(!$item['link']) echo ' no-link' ?>">
								<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>

									<?php if ($item['icon']): ?>
										<figure><i class="<?= $item['icon'] ?>"></i></figure>
									<?php endif ?>
									
									<div class="text">

										<?php if ($item['title']): ?>
											<h6><?= $item['title'] ?></h6>
										<?php endif ?>

										<?= $item['description'] ?>

										<?php if ($item['link']): ?>
											<div class="arrow">
												<i class="fa-solid fa-arrow-right"></i>
											</div>
										<?php endif ?>

									</div>
								</a>
							</div>
						<?php endforeach ?>

						<div class="slider-wrap">
							<div class="swiper home-bottom-slider">
								<div class="swiper-wrapper">

									<?php foreach ($cards as $item): ?>
										<div class="swiper-slide">
											<div class="item<?php if(!$item['link']) echo ' no-link' ?>">
												<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($field['target']) echo ' target="_blank"' ?>>

													<?php if ($item['icon']): ?>
														<figure><i class="<?= $item['icon'] ?>"></i></figure>
													<?php endif ?>

													<div class="text">

														<?php if ($item['title']): ?>
															<h6><?= $item['title'] ?></h6>
														<?php endif ?>

														<?= $item['description'] ?>

														<?php if ($item['link']): ?>
															<div class="arrow">
																<i class="fa-solid fa-arrow-right"></i>
															</div>
														<?php endif ?>

													</div>
												</a>
											</div>
										</div>
									<?php endforeach ?>

								</div>
							</div>
							<div class="swiper-pagination home-bottom-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

</section>

<?php endif; ?>