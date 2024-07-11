<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="img-text text-slider-block<?php if($background_color == 'Light blue') echo ' bg-l-blue'; if($image_position == 'Left') echo ' text-slider-block-revers'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap align-items-center">
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

					<?php if (is_array($slider_items) && checkArrayForValues($slider_items)): ?>
					<div class="col-lg-6 col-12 slider-wrap">
						<div class="swiper img-slider">
							<div class="swiper-wrapper">

								<?php foreach ($slider_items as $item): ?>
									<div class="swiper-slide">
										<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
									</div>
								<?php endforeach ?>
								
							</div>
						</div>
						<div class="wrap-bottom d-flex">
							<div class="wrap">
								<div thumbsSlider="" class="swiper text-img-slider">
									<div class="swiper-wrapper">

										<?php foreach ($slider_items as $item): ?>
											<div class="swiper-slide">
												<p><?= $item['text'] ?></p>
											</div>
										<?php endforeach ?>
										
									</div>
								</div>
							</div>
							<div class="arrow d-flex flex-row-reverse">
								<div class="swiper-button-next next-i d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-right"></i></div>
								<div class="swiper-button-prev prev-i d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-left"></i></div>
							</div>
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>

<?php endif; ?>