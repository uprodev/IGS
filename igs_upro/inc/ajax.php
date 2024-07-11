<?php

$actions = [
	'load_news',
	'load_vacancies',
	'search_news',
	'vacancies_by_term',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function load_news () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="item">
				<?php get_template_part('parts/content', 'news', ['post_id' => get_the_ID()]) ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}

function load_vacancies () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<?php get_template_part('parts/content', 'vacancy') ?>

		<?php }
	}
	wp_reset_query(); 
	die();
}

function search_news(){

	$knowledge_label = '';
	if ($_GET['knowledge_label']) {
		$knowledge_label = array(
			'taxonomy' => 'knowledge_label',
			'field'    => 'id',
			'terms'    => $_GET['knowledge_label']
		);
	}

	$category = '';
	if ($_GET['categories']) {
		$term = get_term($_GET['categories']);
		$taxonomy = $term->taxonomy;

		$category = array(
			'taxonomy' => $taxonomy,
			'field'    => 'id',
			'terms'    => (int)$_GET['categories']
		);
	}

	$args  = array(
		'post_type' => ['knowledge', 'event', 'download'],
		's' => $_GET['s'],
		'post_status' => 'publish',
		'posts_per_page' => -1,
		/*'relevanssi'  => true,*/
	);

	if($_GET['post_types']) $args['post_type'] = $_GET['post_types'];

	if ($knowledge_label || $category) {
		$args['tax_query'] = [
			'relation' => 'AND',
			$knowledge_label,
			$category,
		];
	}

	$wp_query = new WP_Query($args);

	/*$wp_query->parse_query($args);

	add_filter( 'pre_option_relevanssi_excerpts', '__return_false' );

	relevanssi_do_query($wp_query);*/ ?>

	<div class="content d-flex flex-wrap" id="response_news">
		<?php while($wp_query->have_posts()): $wp_query->the_post(); ?>

			<div class="item">
				<?php get_template_part('parts/content', 'news', ['post_id' => get_the_ID()]) ?>
			</div>

		<?php endwhile;?>

	</div>

	<?php if($wp_query->max_num_pages > 1):?>
		<script> var this_page = 1; </script>

		<div class="btn-wrap d-flex justify-content-center">
			<a href="#" class="btn-default load_news" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>Laad meer</a>
		</div>

	<?php endif;?>

	<?php /*remove_filter( 'pre_option_relevanssi_excerpts', '__return_false' );*/

	die();

}

function vacancies_by_term(){

	$args  = array(
		'post_type'  => 'vacancy',
		'posts_per_page' => -1,
		'tax_query' => [
			[
				'taxonomy' => 'vacancy_language',
				'field' => 'id',
				'terms' => $_GET['term_id']
			]
		]
	);

	$wp_query = new WP_Query( $args );

	?>

	<div class="content d-flex flex-wrap" id="response_vacancies">
		<?php while($wp_query->have_posts()): $wp_query->the_post(); ?>

			<?php get_template_part('parts/content', 'vacancy') ?>

		<?php endwhile;?>

	</div>

	<?php if($wp_query->max_num_pages > 1):?>
		<script> var this_page = 1; </script>

		<div class="btn-wrap d-flex justify-content-center">
			<a href="#" class="btn-default load_vacancies" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>Laad meer</a>
		</div>

	<?php endif;?>

	<?php 
	die();

}