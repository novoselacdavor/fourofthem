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
