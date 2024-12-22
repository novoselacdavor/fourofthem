<?php
/**
 * Helpers.
 */

/**
 * Get field wrapper.
 * Helper function that is a wrapper for Advanced Custom Fields get_field() function.
 *
 * @param string $field_selector Field name or field key.
 * @param null|int|string $post_id Post ID or option id for option pages or null for global post ID.
 * @param bool $format_value Should the field value return formatted or not.
 * @param bool $default The default value to return if there is no value in the field.
 * @return mixed Field value or $default.
 */
function fourofthem_get_field( string $field_selector, $post_id = null, bool $format_value = true, $default = false ) {
	// Assume we don't have any value and set it to $default.
	$return_value = $default;

	// Check if get_field() function exists.
	if ( function_exists( 'get_field' ) ) {
		// Get the field value.
		$field_value = get_field( $field_selector, $post_id, $format_value );

		if ( is_numeric( $field_value ) || ! empty( $field_value ) ) {
			// If the value is numeric use that.
			// That way we'll return even '0' for number and range fields.
			$return_value = $field_value;
		}
	}

	return $return_value;
}

/**
 * Movies shortcode.
 *
 * @param array $atts {
 *   Shortcode attributes.
 *
 *   @type string $genre Genre(s) to filter movies by.
 *   @type int    $posts_per_page The number of posts to show per page. Defaults to -1 (all posts).
 * }
 *
 * @return string The HTML output of the shortcode.
 */

add_shortcode(
	'movies',
	function( $atts ) {
		$args = shortcode_atts(
			[
				'genre'          => '',
				'posts_per_page' => -1,
			],
			$atts
		);

		$query_args = [
			'post_type'      => 'movie',
			'posts_per_page' => $args['posts_per_page'],
			'orderby'        => 'title',
			'order'          => 'ASC',
		];

		if ( ! empty( $args['genre'] ) ) {
			$query_args['tax_query'] = [
				[
					'taxonomy' => 'genre',
					'field'    => 'slug',
					'terms'    => $args['genre'],
				],
			];
		}

		$movies = new WP_Query( $query_args );
		$output = '';

		if ( $movies->have_posts() ) {
			$output .= '<div class="item-listing">';

			while ( $movies->have_posts() ) {
				$movies->the_post();
        ob_start();
        get_template_part( 'templates/content', 'movie' );
        $content = ob_get_clean();
        $output .= $content;
			}

			$output .= '</div>';
			wp_reset_postdata();

		} else {
			$output = '<p>No movies found.</p>';
		}

		return $output;
	}
);
