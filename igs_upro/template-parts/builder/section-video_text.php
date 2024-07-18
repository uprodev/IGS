<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="video-text<?php if($media_position == 'Right') echo ' video-text-revers' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap">

					<?php $is_video = $video_popup && $video_url ?>

					<figure class="col-lg-6 col-12">

						<?php if ($is_video): ?>
							<a data-fancybox href="<?= $video_url ?>?autoplay=1">
							<?php endif ?>
							
							<?php if ($image): ?>
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							<?php endif ?>

							<?php if ($is_video): ?>
								<span class="icon-wrap"><img src="<?= get_stylesheet_directory_uri() ?>/img/play1.svg" alt=""></span>
							</a>
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

						<?php if ($button): ?>
							<div class="btn-wrap">
								<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>