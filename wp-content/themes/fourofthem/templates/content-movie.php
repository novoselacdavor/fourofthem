<article <?php post_class( [ 'card', 'card--movie' ] ); ?> >
	<a class="card__link" href="<?php the_permalink(); ?>">
		<div class="card__img-wrap">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'img-3x2-450' );
			}
			?>
		</div>
		<div class="card__content">
			<h3 class="card__title">
				<?php the_title(); ?>
			</h3>
			<div class="card__description">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</a>
</article>
