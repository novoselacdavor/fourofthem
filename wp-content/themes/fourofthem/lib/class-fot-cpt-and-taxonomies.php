<?php
/**
 * FOT_CPT_And_Taxonomies helper class.
 */
final class FOT_CPT_And_Taxonomies {
	/**
	 * Register custom post types and taxonomies.
	 */
	public static function init() : void {
		self::register_post_types();
		self::register_taxonomies();
	}

	/**
	 * Register custom post types.
	 */
	private static function register_post_types() {
		/**
		 * Movies CPT
		*/
		register_post_type(
			// CPT Name
			'movie',
			// CPT Options
			[
				'label'             => __( 'Movies', 'fot-cpt-and-taxonomies' ),
				'supports'          => [ 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ],
				'public'            => true,
				'hierarchical'      => false,
				'show_ui'           => true,
				'show_in_menu'      => true,
				'show_in_nav_menus' => true,
				'menu_position'     => 56,
				'show_in_admin_bar' => true,
				'can_export'        => true,
				'has_archive'       => true,
				'capability_type'   => 'page',
				'show_in_rest'      => true,
				'orderby'           => 'menu_order',
				'rewrite'           => [
					'slug' => 'movies',
				],
				'labels'            => [
					'add_new'               => _x( 'Add New Movie', 'fot-cpt-and-taxonomies' ),
					'add_new_item'          => __( 'Add New Movie', 'fot-cpt-and-taxonomies' ),
					'edit_item'             => __( 'Edit Movie', 'fot-cpt-and-taxonomies' ),
					'new_item'              => __( 'New Movie', 'fot-cpt-and-taxonomies' ),
					'view_item'             => __( 'View Movie', 'fot-cpt-and-taxonomies' ),
					'search_items'          => __( 'Search Movies', 'fot-cpt-and-taxonomies' ),
					'not_found'             => __( 'No Movies found.', 'fot-cpt-and-taxonomies' ),
					'not_found_in_trash'    => __( 'No Movies found in trash.', 'fot-cpt-and-taxonomies' ),
					'parent_item_colon'     => __( 'Parent Movie:', 'fot-cpt-and-taxonomies' ),
					'all_items'             => __( 'All Movies', 'fot-cpt-and-taxonomies' ),
					'archives'              => __( 'Movie Archives', 'fot-cpt-and-taxonomies' ),
					'insert_into_item'      => __( 'Insert into Movie', 'fot-cpt-and-taxonomies' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'fot-cpt-and-taxonomies' ),
					'filter_items_list'     => __( 'Filter Movies list', 'fot-cpt-and-taxonomies' ),
					'items_list_navigation' => __( 'Movies list navigation', 'fot-cpt-and-taxonomies' ),
					'items_list'            => __( 'Movies list', 'fot-cpt-and-taxonomies' ),
				],
			],
		);
	}

	/**
	 * Register custom taxonomies.
	 */
	private static function register_taxonomies() {
		register_taxonomy(
			// Taxonomy name.
			'genre',
			// CPT name.
			[
				'movie',
			],
			// Taxonomy options.
			[
				'label'             => __( 'Genre', 'fot-cpt-and-taxonomies' ),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels'            => [
					'search_items'               => __( 'Genre', 'fot-cpt-and-taxonomies' ),
					'popular_items'              => __( 'Popular Genres', 'fot-cpt-and-taxonomies' ),
					'all_items'                  => __( 'All Genres', 'fot-cpt-and-taxonomies' ),
					'parent_item'                => __( 'Parent Genre', 'fot-cpt-and-taxonomies' ),
					'parent_item_colon'          => __( 'Parent Genre:', 'fot-cpt-and-taxonomies' ),
					'edit_item'                  => __( 'Edit Genre', 'fot-cpt-and-taxonomies' ),
					'view_item'                  => __( 'View Genre', 'fot-cpt-and-taxonomies' ),
					'update_item'                => __( 'Update Genre', 'fot-cpt-and-taxonomies' ),
					'add_new_item'               => __( 'Add New Genre', 'fot-cpt-and-taxonomies' ),
					'new_item_name'              => __( 'New Genre Name', 'fot-cpt-and-taxonomies' ),
					'separate_items_with_commas' => __( 'Separate Genres with commas', 'fot-cpt-and-taxonomies' ),
					'add_or_remove_items'        => __( 'Add or remove Genre', 'fot-cpt-and-taxonomies' ),
					'choose_from_most_used'      => __( 'Choose from most used Genres', 'fot-cpt-and-taxonomies' ),
					'not_found'                  => __( 'No Genres found', 'fot-cpt-and-taxonomies' ),
					'no_terms'                   => __( 'No Genre', 'fot-cpt-and-taxonomies' ),
					'items_list_navigation'      => __( 'Genres list navigation', 'fot-cpt-and-taxonomies' ),
					'items_list'                 => __( 'Genres list', 'fot-cpt-and-taxonomies' ),
					'no_item'                    => __( 'No Genre', 'fot-cpt-and-taxonomies' ),
				],
			],
		);
	}
}

/**
 * Init FOT_CPT_And_Taxonomies class.
 */
FOT_CPT_And_Taxonomies::init();
