<?php
get_header();

// Get movie genres
$terms      = get_the_terms( $post->ID, 'genre' );
$terms_list = implode(
	', ',
	array_map(
		function($term) {
		return '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	},
	$terms
	)
);

?>
<div class="container">
	<div class="single__inner mt-4 mb-4">
		<div class="single__entry">
			<div class="single__img-wrap">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'img-3x2-1200' );
				}
				?>
			</div>
			<h1 class="single__title">
				<?php the_title(); ?>
			</h1>
		</div>
		<?php
		if ( have_posts() ) :
		?>
		<div class="single__content mt-4">
			<?php if ( $terms_list ) : ?>
				<div class="single__categories">
					<span><?php esc_html_e( 'Genre', 'fourofthem' ); ?>:</span>
					<div><?php echo $terms_list; ?></div>
				</div>
			<?php endif; ?>
			<?php
			while ( have_posts() ) : the_post();
				the_content();
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