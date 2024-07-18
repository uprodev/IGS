<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="slider-3x<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="top text-center">

					<?php if ($subtitle): ?>
						<h6 class="sub-title"><?= $subtitle ?></h6>
					<?php endif ?>

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<?= $description ?>

				</div>

				<?php if (is_array($steps) && checkArrayForValues($steps)): ?>
				<div class="slider-wrap">
					<div class="content">
						<div class="swiper slider-item">
							<div class="swiper-wrapper">

								<?php foreach ($steps as $item): ?>
									<div class="swiper-slide">
										<div class="item<?php if(!$item['link']) echo ' no-link' ?>">
											<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>
												<figure>

													<?php if ($item['icon']): ?>
														<div class="icon-wrap">
															<i class="<?= $item['icon'] ?>"></i>
														</div>
													<?php endif ?>

													<?php if ($item['image']): ?>
														<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
													<?php endif ?>

												</figure>
												<div class="text">
													
													<?php if ($item['subtitle']): ?>
														<h6 class="sub-title"><?= $item['subtitle'] ?></h6>
													<?php endif ?>
													
													<?php if ($item['title']): ?>
														<h4><?= $item['title'] ?></h4>
													<?php endif ?>
													
													<?php if ($item['description']): ?>
														<?= add_class_content($item['description'], 'check-list') ?>
													<?php endif ?>
													
												</div>
											</a>
											
											<?php if ($item['info_tooltip_text']): ?>
												<div class="tooltip-wrap">
													<p data-text="<?= $item['info_tooltip_text'] ?>"><i class="fa-light fa-circle-info"></i></p>
												</div>
											<?php endif ?>
											
										</div>
									</div>
								<?php endforeach ?>
								
							</div>
						</div>
					</div>

					<?php if (count($steps) > 3): ?>
						<div class="swiper-button-next next-item d-flex justify-content-center align-items-center btn"><i class="fa-light fa-arrow-right "></i></div>
						<div class="swiper-button-prev prev-item d-flex justify-content-center align-items-center btn"><i class="fa-light fa-arrow-left "></i></div>
						<div class="swiper-pagination pagination-item"></div>
					<?php endif ?>
					
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>