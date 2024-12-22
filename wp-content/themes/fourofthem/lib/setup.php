<?php
/**
 * Theme setup.
 */


/**
 * Init theme features.
 */
add_action(
	'after_setup_theme',
	function() {
		// Theme supports.
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

		// Register menus.
		register_nav_menus(
			[
				'main_navigation'   => __( 'Main Navigation', 'fourofthem' ),
				'footer_navigation' => __( 'Footer Navigation', 'fourofthem' ),
			]
		);

		// Add image sizes
		add_image_size( 'img-full-hd', 1920, 1080, true ); // full hd image
		add_image_size( 'img-3x2-1200', 1200, 800, true ); // post featured image
		add_image_size( 'img-3x2-450', 450, 300, true ); // post listing image
	}
);


/**
 * Theme assets.
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		// Use new version of jQuery on CDN and move it to the footer.
		if ( ! is_admin() ) {
			wp_deregister_script( 'jquery' );
			wp_register_script(
				'jquery',
				'https://code.jquery.com/jquery-3.7.1.min.js',
				[],
				'3.7.1',
				true
			);
			wp_enqueue_script( 'jquery' );
		}

		// Theme main JavaScript.
		if ( Fot_Assets::asset_exists( 'main.js' ) ) {
			wp_enqueue_script(
				'fot-main',
				Fot_Assets::get_asset_uri( 'main.js' ),
				[],
				false,
				true
			);
		}

		// Theme main CSS.
		if ( Fot_Assets::asset_exists( 'main.css' ) ) {
			wp_enqueue_style(
				'fot-main',
				Fot_Assets::get_asset_uri('main.css'),
				[],
				false
			);
		}

		// Theme fonts.
		wp_enqueue_style(
			'josefin-sans',
			'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,600;1,400&display=swap',
			[],
			null
		);

		wp_enqueue_style(
			'crimson-text',
			'https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600&display=swap',
			[],
			null
		);

	},
	PHP_INT_MAX
);


/**
 * Head scripts.
 */
add_action(
	'wp_head',
	function() {
		// Check if JavaScript is enabled (https://www.paulirish.com/2009/avoiding-the-fouc-v3/).
		echo '<script>(function(el){el.classList.replace("no-js","js")})(document.documentElement)</script>';
	},
	1
);


/**
 * Edit excerpt limit.
 *
 * @param int $length
 * @return int
 */
add_filter(
	'excerpt_length',
	function ( $length ) {
		$length = 10;

		return $length;
	},
	PHP_INT_MAX
);


/**
 * Edit excerpt more text.
 *
 * @param string $more_string
 * @return string
 */
add_filter(
	'excerpt_more',
	function ( $more_string ) {
		$more_string = ' &hellip;';

		return $more_string;
	},
	PHP_INT_MAX
);

/**
 * Disable prefixes on archive titles.
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

/**
 * Registers a REST endpoint to get movies by genre.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
 */

add_action(
	'rest_api_init',
	function() {
		register_rest_route(
			'wp/v2',
			'movies/genre/(?P<genre>\w+)',
			[
				'methods'  => 'GET',
				'callback' => 'get_movies_by_genre',
			]
		);
	}
);
