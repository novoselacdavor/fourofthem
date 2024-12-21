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
				'main_navigation'   => __( 'Main Navigation', 'gljz' ),
				'footer_navigation' => __( 'Footer Navigation', 'gljz' ),
			]
		);
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
			wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', true );
			wp_enqueue_script( 'jquery' );
		}

		// Theme main JavaScript.
		if ( Fot_Assets::asset_exists( 'main.js' ) ) {
			wp_enqueue_script( 'pg-main', Fot_Assets::get_asset_uri( 'main.js' ), [], false, true );
		}

		// Theme main CSS.
		if ( Fot_Assets::asset_exists( 'main.css' ) ) {
			wp_enqueue_style( 'pg-main', Fot_Assets::get_asset_uri( 'main.css' ), [], false );
		}

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
