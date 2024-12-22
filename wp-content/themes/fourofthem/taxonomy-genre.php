<?php
get_header();

$term_name = get_query_var( 'term' );
?>
<div class="container mt-4 mb-4">
	<h1 class="archive__title">
		<?php echo esc_html( $term_name ); ?>
	</h1>
	<?php
	if ( have_posts() ) :
	?>
	<div class="archive__item-list">
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
<?php
get_footer();
?>
