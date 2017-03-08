<?php

// Creat Movie Listing Post Type
function ml_register_movie_listing() {
	$singular_name = apply_filters('mtl_label_single', 'Movie Listing');
	$plural_name = apply_filters('mtl_label_plural', 'Movie Listings');

	$labels = array(
		'name'                  =>  $plural_name,
		'singular_name'         =>  $singular_name,
		'add_new'               =>  'Add New',
		'add_new_item'          =>  'Add New ' . $singular_name,
		'edit'                  =>  'Edit',
		'edit_item'             =>  'Edit ' . $singular_name,
		'new_item'              =>  'New ' . $singular_name,
		'view'                  =>  'View',
		'view item'             =>  'View ' . $singular_name,
		'search_items'          =>  'Search ' . $plural_name,
		'not_found'             =>  'No ' . $plural_name . ' Found',
		'not_found_in_trash'    =>  'No ' . $plural_name . ' Found',
		'parent_item_colon'     =>  'Parent ' . $singular_name,
		'menu_item'             =>  $plural_name
	);

	$args = apply_filters('ml_movie_listing_args', array(
		'labels'                =>  $labels,
		'hierarchical'          =>  true,
		'description'           =>  'Movie listings by genre',
		'taxonomies'            =>  array('genres'),
		'public'                =>  true,
		'show_ui'               =>  true,
		'show_in_menu'          =>  true,
		'menu_position'         =>  5,
		'menu_icon'             =>  'dashicons-video-alt2',
		'show_in_nav_menus'     =>  true,
		'public_queryable'      =>  true,
		'exclude_from_search'   =>  false,
		'has_archive'           =>  true,
		'query_var'             =>  true,
		'can_export'            =>  true,
		'rewrite'               =>  true,
		'cabability_type'       => 'post',
		'supports'              => array(
			'title',
			'thumbnail'
		)
	));

	// Register Post Type
	register_post_type('movie_listing', $args);
}

add_action('init', 'ml_register_movie_listing');

// Create Genres Taxonomy
function ml_genres_taxonomy() {
	register_taxonomy(
		'genres',
		'movie_listing',
		array(
			'label'     =>  'Genres',
			'query_var' =>  true,
			'rewrite'   =>  array(
				'slug'          =>  'genre',
				'with_front'    => false,
			)
		)
	);
}

add_action('init', 'ml_genres_taxonomy');