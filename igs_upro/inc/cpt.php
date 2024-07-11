<?php 

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	$post_types = ['solution' => 'Solutions', 'service' => 'Services', 'event' => 'Events', 'vacancy' => 'Vacancies', 'knowledge' => 'Knowledge', 'landing' => 'Landingpages', 'download' => 'Downloads'];
	$taxonomies = ['cat' => ['Categories', 'Category'], 'label' => ['Labels', 'Label']];

	foreach ($taxonomies as $taxonomy_key => $taxonomy) {
		foreach ($post_types as $post_type_key => $post_type) {
			register_taxonomy($post_type_key . '_' . $taxonomy_key, [$post_type_key], [
				'label'                 => $taxonomy[0], 
				'labels'                => [
					'name'              => $taxonomy[0],
					'singular_name'     => $taxonomy[1],
			//'search_items'      => 'Search Genres',
			//'all_items'         => 'All Genres',
			//'view_item '        => 'View Genre',
			//'parent_item'       => 'Parent Genre',
			//'parent_item_colon' => 'Parent Genre:',
			//'edit_item'         => 'Edit Genre',
			//'update_item'       => 'Update Genre',
			//'add_new_item'      => 'Add New Genre',
			//'new_item_name'     => 'New Genre Name',
			//'menu_name'         => 'Genre',
			//'back_to_items'     => '← Back to Genre',
				],
				'description'           => '', 
				'public'                => true,
		// 'publicly_queryable'    => null, 
		// 'show_in_nav_menus'     => true, 
		// 'show_ui'               => true, 
		// 'show_in_menu'          => true, 
		// 'show_tagcloud'         => true, 
		// 'show_in_quick_edit'    => null, 
				'hierarchical'          => true,

				'rewrite'               => true,
		//'query_var'             => $taxonomy, 
				'capabilities'          => array(),
		'meta_box_cb'           => null, // 
		'show_admin_column'     => false, // 
		'show_in_rest'          => null, // 
		'rest_base'             => null, // 
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
		}
	}


	register_taxonomy('vacancy' . '_language', ['vacancy'], [
		'label'                 => 'Languages', 
		'labels'                => [
			'name'              => 'Languages',
			'singular_name'     => 'Language',
			//'search_items'      => 'Search Genres',
			//'all_items'         => 'All Genres',
			//'view_item '        => 'View Genre',
			//'parent_item'       => 'Parent Genre',
			//'parent_item_colon' => 'Parent Genre:',
			//'edit_item'         => 'Edit Genre',
			//'update_item'       => 'Update Genre',
			//'add_new_item'      => 'Add New Genre',
			//'new_item_name'     => 'New Genre Name',
			//'menu_name'         => 'Genre',
			//'back_to_items'     => '← Back to Genre',
		],
		'description'           => '', 
		'public'                => true,
		// 'publicly_queryable'    => null, 
		// 'show_in_nav_menus'     => true, 
		// 'show_ui'               => true, 
		// 'show_in_menu'          => true, 
		// 'show_tagcloud'         => true, 
		// 'show_in_quick_edit'    => null, 
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, 
		'capabilities'          => array(),
		'meta_box_cb'           => null, // 
		'show_admin_column'     => false, // 
		'show_in_rest'          => null, // 
		'rest_base'             => null, // 
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
	
}


add_action( 'init', 'register_post_types' );

function register_post_types(){

	$post_types = ['solution' => 'Solutions', 'service' => 'Services', 'event' => 'Events', 'vacancy' => 'Vacancies', 'knowledge' => 'Knowledge', 'landing' => 'Landingpages'];

	foreach ($post_types as $key => $value) {
		register_post_type( $key, [
			'label'  => null,
			'labels' => [
				'name'               => $value, 
				'singular_name'      => ucfirst($key), 
				//'add_new'            => '', 
				//'add_new_item'       => '', 
				//'edit_item'          => '', 
				//'new_item'           => '', 
				//'view_item'          => '', 
				//'search_items'       => '', 
				//'not_found'          => '', 
				//'not_found_in_trash' => '', 
				//'parent_item_colon'  => '', 
				//'menu_name'          => '', 
			],
			'description'            => '',
			'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null,
		// 'show_in_nav_menus'   => null, 
		//	'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null,
		//	'show_in_rest'        => null,
		//	'rest_base'           => null,
		//	'menu_position'       => null,
		//	'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
			'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		//'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	}

	$post_types = ['download' => 'Downloads'];

	foreach ($post_types as $key => $value) {
		register_post_type( $key, [
			'label'  => null,
			'labels' => [
				'name'               => $value, 
				'singular_name'      => ucfirst($key), 
				//'add_new'            => '', 
				//'add_new_item'       => '', 
				//'edit_item'          => '', 
				//'new_item'           => '', 
				//'view_item'          => '', 
				//'search_items'       => '', 
				//'not_found'          => '', 
				//'not_found_in_trash' => '', 
				//'parent_item_colon'  => '', 
				//'menu_name'          => '', 
			],
			'description'            => '',
			'public'                 => true,
			//'publicly_queryable'  => false, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null,
		// 'show_in_nav_menus'   => null, 
		//	'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null,
		//	'show_in_rest'        => null,
		//	'rest_base'           => null,
		//	'menu_position'       => null,
		//	'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
			'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		//'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	}

}