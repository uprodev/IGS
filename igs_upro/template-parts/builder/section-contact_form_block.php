<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="text-form<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">

			<?php 
			foreach ($args['row'] as $key => $arg) {
				$$key = $custom_default == 'Custom' ? $arg : get_field($key . '_cf', 'option');
			}
			?>

			<div class="row">
				<div class="content d-flex justify-content-between flex-wrap">

					<?php if ($image_desktop): ?>
						<div class="img-wrap">
							<?= wp_get_attachment_image($image_desktop['ID'], 'full') ?>
						</div>
					<?php endif ?>
					
					<div class="text">
						<div class="user">

							<?php if ($image_mobile): ?>
								<div class="user-img">
									<?= wp_get_attachment_image($image_mobile['ID'], 'full') ?>
								</div>
							<?php endif ?>

							<div class="user-text">

								<?php if ($subtitle): ?>
									<h6 class="sub-title sub-title-white"><?= $subtitle ?></h6>
								<?php endif ?>

								<?php if ($title): ?>
									<h2><?= $title ?></h2>
								<?php endif ?>

							</div>
						</div>
						
						<?= $description ?>

						<?php if ($mail_link || $phone_link): ?>
							<ul>

								<?php if ($mail_link): ?>
									<li>
										<a href="<?= $mail_link['url'] ?>"<?php if($mail_link['target']) echo ' target="_blank"' ?>><i class="fa-light fa-envelope"></i><?= $mail_link['title'] ?></a>
									</li>
								<?php endif ?>

								<?php if ($phone_link): ?>
									<li>
										<a href="<?= $phone_link['url'] ?>"<?php if($phone_link['target']) echo ' target="_blank"' ?>><i class="fa-light fa-phone"></i><?= $phone_link['title'] ?></a>
									</li>
								<?php endif ?>

							</ul>
						<?php endif ?>

					</div>
					<div class="form-wrap">

						<?php if ($form_desktop): ?>
							<?= do_shortcode('[contact-form-7 id="' . $form_desktop . '" html_class="form-white"]') ?>
						<?php endif ?>

						<?php if ($form_mobile): ?>
							<?= do_shortcode('[contact-form-7 id="' . $form_mobile . '" html_class="form-step"]') ?>
						<?php endif ?>
						
						<?php if ($privacy_policy_text): ?>
							<div class="info-text"><?= $privacy_policy_text ?></div>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>