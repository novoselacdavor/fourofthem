<?php
/**
 * Register ACF blocks.
 */
add_action(
	'acf/init',
	function() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		acf_register_block_type(
			[
				'name'            => 'favorite-movie-quotes',
				'title'           => 'Favorite movie quotes',
				'render_template' => get_template_directory() . '/templates/blocks/favorite-movie-quotes.php',
				'category'        => 'common',
				'icon'            => 'marker',
				'post_types'      => [ 'movie' ],
				'supports'        => [
					'mode'  => false,
					'align' => false,
				],
				'mode'            => 'edit',
				'multiple'        => true,
			]
		);
	}
);

/**
 * Add "Very Simple" option to acf WYSIWYG field
 */
add_filter(
	'acf/fields/wysiwyg/toolbars',
	function( $toolbars ) {
		$toolbars['Very Simple']    = [];
		$toolbars['Very Simple'][1] = [ 'formatselect', 'bold', 'italic', 'link', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'highlight_mce_button' ];
		return $toolbars;
	}
);
