<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($flexible): ?>
		<section class="text-default"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container">
				<div class="row">
					<div class="content col-lg-8 col-12">

						<?php 
						foreach ($flexible as $item):

							switch ($item['acf_fc_layout']) {

								case 'text_block':
								?>

								<div class="<?php if(!$item['spacing_top']) echo 'mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">
									<?php if ($item['subtitle']): ?>
										<h6 class="sub-title"><?= $item['subtitle'] ?></h6>
									<?php endif ?>

									<?php if ($item['title']): ?>
										<<?= $item['title_h2_h3'] ?>><?= $item['title'] ?></<?= $item['title_h2_h3'] ?>>
									<?php endif ?>

									<?= $item['text_content'] ?>
								</div>

								<?php 
								break;

								case 'image_slider_block':
								?>

								<?php if (is_array($item['images']) && checkArrayForValues($item['images'])): ?>
								<div class="slier-wrap<?php if(!$item['spacing_top']) echo 'mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">
									<div class="swiper img-full-slider">
										<div class="swiper-wrapper">

											<?php foreach ($item['images'] as $item_2): ?>
												<div class="swiper-slide">

													<?php if ($item_2['image']): ?>
														<?= wp_get_attachment_image($item_2['image']['ID'], 'full') ?>
													<?php endif ?>

													<?php if ($item_2['image_caption']): ?>
														<p class="line"><?= $item_2['image_caption'] ?></p>
													<?php endif ?>

												</div>
											<?php endforeach ?>

										</div>

										<?php if (count($item['images']) > 1): ?>
											<div class="nav-wrap d-flex justify-content-between">
												<div class="swiper-button-next img-full-next"><i class="fa-solid fa-arrow-right"></i></div>
												<div class="swiper-button-prev img-full-prev"><i class="fa-solid fa-arrow-left"></i></div>
											</div>
										<?php endif ?>
										
									</div>
								</div>
							<?php endif ?>

							<?php 
							break;

							case 'quote_block':
							?>

							<div class="cta-block cta-big p-0<?php if(!$item['spacing_top']) echo 'mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">
								<div class="content d-flex justify-content-between flex-wrap">

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

										<?php if ($item['subtitle']): ?>
											<h6 class="sub-title sub-title-white"><?= $item['subtitle'] ?></h6>
										<?php endif ?>
										
										<?php if ($item['title']): ?>
											<h3 class="mt-0"><?= $item['title'] ?></h3>
										<?php endif ?>

										<?php if ($item['description']): ?>
											<div class="text-wrap"><?= $item['description'] ?></div>
										<?php endif ?>
										
										<?php if ($item['button'] || $item['telephone']): ?>
											<div class="btn-wrap d-flex align-items-center flex-wrap">

												<?php if ($item['button']): ?>
													<a href="<?= $item['button']['url'] ?>" class="btn-default btn-white"<?php if($item['button']['target']) echo ' target="_blank"' ?>><?= $item['button']['title'] ?></a>
												<?php endif ?>

												<?php if ($item['telephone']): ?>
													<a href="<?= $item['telephone']['url'] ?>" class="link-tel d-flex"<?php if($item['telephone']['target']) echo ' target="_blank"' ?>><i class="fa-light fa-phone"></i> <?= $item['telephone']['title'] ?></a>
												<?php endif ?>

											</div>
										<?php endif ?>

									</div>
								</div>
							</div>

							<?php 
							break;

							case 'link_and_socials_share_block':
							?>

							<?php 
							$fields = ['previous_page_text_link', 'share_text', 'share_icons'];
							foreach ($fields as $field) {
								$$field = $item['custom_default'] == 'Custom' ? $item[$field] : get_field($field . '_s', 'option');
							}
							?>

							<div class="bottom-link d-flex flex-wrap justify-content-between align-items-center">

								<?php if ($previous_page_text_link): ?>
									<div class="link-wrap">
										<a href="#" onclick="history.back();"><i class="fa-regular fa-arrow-left"></i><?= $previous_page_text_link ?></a>
									</div>
								<?php endif ?>
								
								<?php if (is_array($share_icons) && checkArrayForValues($share_icons)): ?>
								<ul class="soc-list d-flex align-items-center">

									<?php if ($share_text): ?>
										<li><p><?= $share_text ?></p></li>
									<?php endif ?>

									<?php foreach ($share_icons as $share_icon): ?>
										<?php if ($share_icon['icon'] && $share_icon['share_link']): ?>
											<li><a href="<?= $share_icon['share_link']['url'] ?>"<?php if($share_icon['share_link']['target']) echo ' target="_blank"' ?>><i class="<?= $share_icon['icon'] ?>"></i></a></li>
										<?php endif ?>
									<?php endforeach ?>
									
								</ul>
							<?php endif ?>

						</div>

						<?php 
						break;

						default:
						break;

					}

				endforeach ?>						

			</div>
		</div>
	</div>
</section>
<?php endif ?>

<?php endif; ?>