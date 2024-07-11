<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($usps) && checkArrayForValues($usps)): ?>
	<section class="usp-block<?php if($background_color == 'Light blue') echo ' bg-l-blue'; if(!$white_spacing_top) echo ' pt-0'; if(!$white_spacing_bottom) echo ' pb-0'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="bg"></div>
		<div class="container">
			<div class="row">
				<div class="content d-flex flex-wrap">

					<?php foreach ($usps as $item): ?>
						<div class="item<?php if(!$item['link']) echo ' no-link' ?>">
							<a href="<?= $item['link'] ? $item['link']['url'] : '' ?>"<?php if($item['link'] && $item['link']['target']) echo ' target="_blank"' ?>>

								<?php if ($item['icon']): ?>
									<figure><i class="<?= $item['icon'] ?>"></i></figure>
								<?php endif ?>
								
								<div class="text">
									
									<?php if ($item['title']): ?>
										<h6><?= $item['title'] ?></h6>
									<?php endif ?>

									<?= $item['description'] ?>

								</div>
							</a>
						</div>
					<?php endforeach ?>
					
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>