<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="news news-block location-block<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
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

				<?php if (is_array($locations) && checkArrayForValues($locations)): ?>
				<div class="content d-flex flex-wrap ">

					<?php foreach ($locations as $item): ?>
						<div class="item">

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
									<h5><?= $item['title'] ?></h5>
								<?php endif ?>

								<?= $item['description'] ?>

							</div>
						</div>
					<?php endforeach ?>
					
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>