<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if($images): ?>

		<section class="img-block m-0<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
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
				</div>
			</div>
			<div class="content">
				<div class="swiper img-big-slider">
					<div class="swiper-wrapper">

						<?php for ($i = 0; $i < 2; $i++) { ?>
							
							<?php foreach($images as $image): ?>

								<div class="swiper-slide">
									<?= wp_get_attachment_image($image['ID'], 'full') ?>
								</div>

							<?php endforeach; ?>

						<?php } ?>

					</div>
				</div>
				<div class="swiper-pagination pagination-big"></div>
				<div class="swiper-button-next next-big d-flex justify-content-center align-items-center btn"><i class="fa-light fa-arrow-right"></i></div>
				<div class="swiper-button-prev prev-big d-flex justify-content-center align-items-center btn"><i class="fa-light fa-arrow-left"></i></div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>