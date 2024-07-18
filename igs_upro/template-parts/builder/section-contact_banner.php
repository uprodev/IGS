<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner precision-banner contact-banner">

		<?php if ($background_image_desktop || $background_image_mobile): ?>
			<div class="bg">

				<?php if ($background_image_desktop): ?>
					<?= wp_get_attachment_image($background_image_desktop['ID'], 'full', 'full', false, array('class' => 'img')) ?>
				<?php endif ?>

				<?php if ($image = $background_image_mobile ?: $background_image_desktop): ?>
					<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img img-mob')) ?>
				<?php endif ?>

			</div>
		<?php endif ?>

		<div class="container">
			<div class="row">
				<div class="content">

					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>
					
					<?php if ($description): ?>
						<div class="text-wrap"><?= $description ?></div>
					<?php endif ?>
					
				</div>

				<?php if (is_array($contact_tabs) && checkArrayForValues($contact_tabs)): ?>
				<div class="tab-wrap ">
					<div class="tabs d-flex flex-wrap justify-content-between">
						<ul class="tabs-menu">

							<?php foreach ($contact_tabs as $item): ?>
								<li>

									<?php if ($item['icon']): ?>
										<div class="flag-wrap">
											<?php if (pathinfo($item['icon']['url'])['extension'] == 'svg'): ?>
												<img src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
											<?php else: ?>
												<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
											<?php endif ?>
										</div>
									<?php endif ?>
									
									<?php if ($item['navigation_tab_title']): ?>
										<p><?= $item['navigation_tab_title'] ?></p>
									<?php endif ?>
									
									<div class="arrow-wrap">
										<i class="fa-light fa-arrow-right"></i>
									</div>
								</li>
							<?php endforeach ?>

						</ul>
						<div class="tab-content">

							<?php foreach ($contact_tabs as $item): ?>
								<div class="tab-item">
									<div class="bg-item">
										<div class="user-wrap d-flex flex-wrap justify-content-between">

											<?php if ($item['icon'] || $item['contact_person_image']): ?>
												<figure>

													<?php if ($item['contact_person_image']): ?>
														<?= wp_get_attachment_image($item['contact_person_image']['ID'], 'full') ?>
													<?php endif ?>

													<?php if ($item['icon']): ?>
														<div class="flag-wrap">
															<?php if (pathinfo($item['icon']['url'])['extension'] == 'svg'): ?>
																<img src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
															<?php else: ?>
																<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
															<?php endif ?>
														</div>
													<?php endif ?>

												</figure>
											<?php endif ?>

											<?php if ($item['form_subtitle'] || $item['form_title']): ?>
												<div class="user-text">

													<?php if ($item['form_subtitle']): ?>
														<h6><?= $item['form_subtitle'] ?></h6>
													<?php endif ?>

													<?php if ($item['form_title']): ?>
														<h3><?= $item['form_title'] ?></h3>
													<?php endif ?>

												</div>
											<?php endif ?>
											

										</div>

										<?php if ($item['form']): ?>
											<?= do_shortcode('[contact-form-7 id="' . $item['form'] . '" html_class="form-white"]') ?>
										<?php endif ?>

										<?php if ($item['extra_form_text']): ?>
											<div class="info-text"><?= $item['extra_form_text'] ?></div>
										<?php endif ?>

									</div>

									<?php if (is_array($item['contact_info']) && checkArrayForValues($item['contact_info'])): ?>
									<div class="bottom-wrap d-flex flex-wrap justify-content-between">

										<?php foreach ($item['contact_info'] as $item_2): ?>

											<?php if ($item_2['link']): ?>
												<div class="link-item">
													<a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>>

														<?php if ($item_2['icon']): ?>
															<div class="icon-link">
																<i class="<?= $item_2['icon'] ?>"></i>
															</div>
														<?php endif ?>

														<div class="link-text">
															<p><?= $item_2['link']['title'] ?></p>
														</div>
													</a>
												</div>
											<?php endif ?>
											
										<?php endforeach ?>
										
									</div>
								<?php endif ?>

							</div>
						<?php endforeach ?>

					</div>
				</div>
			</div>
		<?php endif ?>

	</div>
</div>

</section>

<?php endif; ?>