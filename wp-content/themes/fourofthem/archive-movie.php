<?php
get_header();

$genres = get_terms(
	[
		'taxonomy'   => 'genre',
		'hide_empty' => false,
	]
);
?>
<div class="container mt-4 mb-4">
	<h1 class="archive__title">
		<?php esc_html_e( 'Movies', 'fourofthem' ); ?>
	</h1>
	<select id="genre-filter" class="mb-2">
		<option value=""><?php esc_html_e( 'All', 'fourofthem' ); ?></option>
		<?php foreach ( $genres as $genre ) : ?>
			<option value="<?php echo $genre->slug; ?>"><?php echo $genre->name; ?></option>
		<?php endforeach; ?>
	</select>
	<div id="movie-list">
		<div class="loader"></div>
		<?php
		if ( have_posts() ) :
		?>
		<div class="archive__item-list item-listing">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/content', 'movie' );
			endwhile;
			?>
		</div>
		<?php
		endif;
		?>
	</div>
</div>
<?php
get_footer();
?>
