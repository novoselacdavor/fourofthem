<?php
/**
 * FOT Favorite movie quotes block template.
 *
 * @param array $block The block settings and attributes.
 */

/** Create class attribute allowing for custom "className". */
$classes = '';
if ( ! empty( $block['className'] ) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}

?>

<?php if ( have_rows( 'favorite_movie_quotes' ) ) : ?>
	<div class="favorite-movie-quotes mt-4 mb-4">
		<h2><?php esc_html_e( 'Favorite Movie Quotes', 'fourofthem' ); ?></h2>
		<div class="favorite-movie-quotes__items">
			<?php while ( have_rows( 'favorite_movie_quotes' ) ) : ?>
				<?php the_row(); ?>
				<?php
					// Get movie icon and name
					$movie          = get_sub_field( 'favorite_movie' );
					$movie_image_id = get_post_thumbnail_id( $movie );
					$movie_image    = wp_get_attachment_image( $movie_image_id, 'medium' );
					$movie_name     = get_the_title( $movie );
				?>
				<div class="favorite-movie-quotes__item">
					<div class="favorite-movie-quotes__movie">
						<?php echo wp_kses_post( $movie_image ); ?>
						<h6><?php echo wp_kses_post( $movie_name ); ?></h6>
					</div>
					<div class="favorite-movie-quotes__quote">
						<q><?php the_sub_field( 'favorite_quote' ); ?></q>
					</div>
					<div class="favorite-movie-quotes__author">
						<i><?php the_sub_field( 'favorite_author' ); ?></i>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
