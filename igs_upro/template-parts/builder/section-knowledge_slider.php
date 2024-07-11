<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php $posts = $custom_default == 'Default' ? get_posts(array('post_type' => ['knowledge', 'event', 'download'], 'posts_per_page' => 8, 'orderby' => 'date', 'order' => 'DESC')) : $custom_knowledge_items ?>

	<?php if ($posts): ?>
		<section class="news<?php if($background_color == 'Light blue') echo ' bg-l-blue' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container">
				<div class="row">
					<div class="top d-flex justify-content-between flex-wrap align-items-end">
						<div class="title-wrap">

							<?php if ($subtitle): ?>
								<h6 class="sub-title"><?= $subtitle ?></h6>
							<?php endif ?>

							<?php if ($title): ?>
								<h2><?= $title ?></h2>
							<?php endif ?>

							<?= $description ?>

						</div>

						<?php if ($button): ?>
							<div class="btn-wrap">
								<a href="<?= $button['url'] ?>" class="btn-border"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?></a>
							</div>
						<?php endif ?>

					</div>
					<div class="content">
						<div class="swiper news-slider">
							<div class="swiper-wrapper">

								<?php foreach ($posts as $post): ?>
									<div class="swiper-slide">
										<?php get_template_part('parts/content', 'news', ['post_id' => $post->ID]) ?>
									</div>
								<?php endforeach ?>
								
							</div>
						</div>
						<div class="nav-wrap d-flex justify-content-between ">
							<div class="p-wrap d-flex align-items-end">
								<div class="swiper-pagination news-pagination"></div>
							</div>
							<div class="arrow d-flex justify-content-between">
								<div class="swiper-button-next news-next d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-right"></i></div>
								<div class="swiper-button-prev news-prev d-flex justify-content-center align-items-center"><i class="fa-light fa-arrow-left"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>