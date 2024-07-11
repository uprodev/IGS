<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner employ-banner knowledge-banner banner-404 bg-grey m-0"<?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if ($image): ?>
			<div class="bg">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
			</div>
		<?php endif ?>
		
		<div class="container">
			<div class="row">
				<div class="content d-flex flex-wrap justify-content-between">
					<div class="text col-md-10 col-12">

						<?php if ($subtitle): ?>
							<h6 class="label"><?= $subtitle ?></h6>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>

						<?php if ($description): ?>
							<div class="text-wrap"><?= $description ?></div>
						<?php endif ?>


						<?php if ($button): ?>
							<div class="btn-wrap d-flex align-items-center flex-wrap">
								<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>