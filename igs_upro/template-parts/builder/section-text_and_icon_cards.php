<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="item-5x<?php if($background_color == 'Light blue') echo ' bg-l-blue'; if($text_alignment == 'Center') echo ' top-center'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container">
			<div class="row">
				<div class="top">

					<?php if ($subtitle): ?>
						<h6 class="sub-title"><?= $subtitle ?></h6>
					<?php endif ?>

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<?= $description ?>

				</div>

				<?php if (is_array($cards) && checkArrayForValues($cards)): ?>
				<div class="content d-flex flex-wrap">

					<?php foreach ($cards as $item): ?>
						<div class="item<?php if(!$item['link']) echo ' no-link' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>
							<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>">

								<?php if ($item['icon']): ?>
									<div class="icon-wrap">
										<i class="<?= $item['icon'] ?>"></i>
									</div>
								<?php endif ?>
								
								<?php if ($item['title']): ?>
									<div class="text">
										<p><?= $item['title'] ?></p>
									</div>
								<?php endif ?>
								
							</a>
						</div>
					<?php endforeach ?>
					
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>