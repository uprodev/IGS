<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($slider_items) && checkArrayForValues($slider_items)): ?>
	<section class="slider-img-text-section"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="content">
					<div class="swiper img-text-slider">
						<div class="swiper-wrapper">

							<?php foreach ($slider_items as $item): ?>
								<div class="swiper-slide">

									<?php if ($item['image']): ?>
										<figure>
											<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
										</figure>
									<?php endif ?>

									<div class="text">

										<?php if ($item['subtitle']): ?>
											<h6 class="sub-title"><?= $item['subtitle'] ?></h6>
										<?php endif ?>

										<?php if ($item['title']): ?>
											<h2><?= $item['title'] ?></h2>
										<?php endif ?>

										<?= $item['description'] ?>

										<?php if ($item['button']): ?>
											<div class="btn-wrap">
												<a href="<?= $item['button']['url'] ?>" class="btn-default"<?php if($item['button']['target']) echo ' target="_blank"' ?>><?= $item['button']['title'] ?></a>
											</div>
										<?php endif ?>

									</div>
								</div>
							<?php endforeach ?>
							
						</div>
					</div>
					<div class="nav-wrap d-flex justify-content-between align-items-center">
						<div class="pagination-img">
							<ul class="d-flex">

								<?php foreach ($slider_items as $index => $item): ?>
									<li<?php if($index == 0) echo ' class="is-active"' ?>>
										<a href="#" data-text="<?= $item['title'] ?>">
											<span><?= $item['title'] ?></span>
											<span><?php if($index < 9) echo '0'; echo $index + 1; ?></span>
										</a>
									</li>
								<?php endforeach ?>
								
							</ul>
						</div>
						<div class="arrow-wrap d-flex justify-content-between flex-row-reverse">
							<div class="swiper-button-next next-img d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-right"></i></div>
							<div class="swiper-button-prev prev-img d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-left"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>