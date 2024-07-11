<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner precision-banner banner-filter bg-gradient-blue"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="wrap-top">

			<?php if ($background_image_desktop || $background_image_mobile): ?>
				<div class="bg">

					<?php if ($background_image_desktop): ?>
						<?= wp_get_attachment_image($background_image_desktop['ID'], 'full', false, array('class' => 'img')) ?>
					<?php endif ?>

					<?php if ($image = $background_image_mobile ?: $background_image_desktop): ?>
						<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'img img-mob')) ?>
					<?php endif ?>

				</div>
			<?php endif ?>

			<div class="container">
				<div class="row">
					<div class="content">

						<?php if ($label): ?>
							<h6 class="label"><?= $label ?></h6>
						<?php endif ?>
						
						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>

						<?php if ($description): ?>
							<div class="text-wrap"><?= $description ?></div>
						<?php endif ?>

						<?php if ($button): ?>
							<div class="btn-wrap d-flex flex-wrap align-items-center">
								<a href="<?= $button['url'] ?>" class="btn-default"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
		<div class="bottom-filter">
			<div class="container">
				<div class="row">
					<div class="filter">
						<form action="#" class="filter-form" id="search-form">
							<div class="wrap d-flex justify-content-between ">

								<?php 
								$labels_ = get_terms( [
									'taxonomy' => ['knowledge_label'],
									'hide_empty' => false,
								] ); 
								$post_types = ['event' => 'Events', 'download' => 'Downloads'];
								?>

								<?php if ($labels_ || $post_types): ?>
									<div class="left">

										<?php if ($labels['title']): ?>
											<p><?= $labels['title'] ?></p>
										<?php endif ?>

										<div class="line-filter d-flex flex-wrap">
											<div class="input-wrap input-wrap-check">
												<input type="checkbox" name="all" id="check1" checked>
												<label for="check1"><?= $labels['first_pill'] ?: __('Alles', 'IGS') ?></label>
											</div>

											<?php if (is_array($labels_)): ?>
												<?php foreach ($labels_ as $index => $item): ?>
													<div class="input-wrap input-wrap-check">
														<input type="checkbox" name="knowledge_label[]" id="label-<?= $index + 1 ?>" value="<?= $item->term_id ?>">
														<label for="label-<?= $index + 1 ?>"><?= $item->name ?></label>
													</div>
												<?php endforeach ?>
											<?php endif ?>
											
											<?php if (is_array($post_types)): ?>
												<?php foreach ($post_types as $index => $item): ?>
													<div class="input-wrap input-wrap-check">
														<input type="checkbox" name="post_types[]" id="post_type-<?= $index ?>" value="<?= $index ?>">
														<label for="post_type-<?= $index ?>"><?= $item ?></label>
													</div>
												<?php endforeach ?>
											<?php endif ?>
											
										</div>
									</div>
								<?php endif ?>

								<div class="right d-flex">

									<?php 
									$categories_ = get_terms( [
										'taxonomy' => ['knowledge_cat', 'event_cat', 'download_cat'],
										'hide_empty' => false,
									] ); 
									?>

									<?php if (is_array($categories_)): ?>
										<div class="input-wrap select-block">

											<?php if ($categories['title']): ?>
												<label class="form-label" for="select1"><?= $categories['title'] ?></label>
											<?php endif ?>
											
											<select id="categories" name="categories">
												<option value="" disabled selected><?= $categories['input_placeholder'] ?></option>

												<?php foreach ($categories_ as $item): ?>
													<option value="<?= $item->term_id ?>"><?= $item->name ?></option>
												<?php endforeach ?>
												
											</select>
										</div>
									<?php endif ?>

									<div class="input-wrap">

										<?php if ($search['title']): ?>
											<label for="input1"><?= $search['title'] ?></label>
										<?php endif ?>
										
										<input type="search" name="s" id="input1" placeholder="<?= $search['input_placeholder'] ?>">
									</div>	
									<div class="input-wrap input-wrap-submit">
										<button type="submit" class="btn-arrow btn-red btn-find"><i class="fa-regular fa-magnifying-glass"></i></button>
									</div>
								</div>
							</div>
							<input type="hidden" name="action" value="search_news">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>