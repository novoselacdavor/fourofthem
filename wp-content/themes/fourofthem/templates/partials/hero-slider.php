<?php
	$slides = fot_get_field( 'hero_slides' );
?>
<?php if ( $slides ) : ?>
	<section class="swiper swiper--hero">
		<div class="swiper-wrapper">
			<?php foreach ( $slides as $slide ) : ?>
				<?php
					$slide_link   = $slide['url'];
					$slide_url    = $slide_link['url'];
					$slide_target = $slide_link['target'] ? $slide_link['target'] : '_self';
				?>
				<div class="hero-slider swiper-slide">
					<div class="hero-slider__inner">
						<div class="hero-slider__image-column">
							<?php echo wp_get_attachment_image( $slide['image'], 'img-3x2-1200', '', [ 'class' => 'hero-slider__image' ] ); ?>
						</div>
						<div class="hero-slider__content-column">
							<div class="hero-slider__content">
								<span class="label">
									<?php echo esc_html( $slide['label'] ); ?>
								</span>
								<h1 class="hero-slider__title">
									<?php echo esc_html( $slide['title'] ); ?>
								</h1>
								<div class="hero-slider__description">
									<?php echo esc_html( $slide['description'] ); ?>
								</div>
								<?php if ( $slide_link ) { ?>
									<a href="<?php echo esc_url( $slide_url ); ?>" class="btn btn--orange" target="<?php echo esc_attr( $slide_target ); ?>">
										<?php esc_html_e( 'Read more', 'fourofthem' ); ?>
									</a>
								<?php }; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="swiper-nav-wrap">
			<button class="swiper-button-prev" aria-label="<?php echo esc_attr__( 'Previous slide', 'fourofthem' ); ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g id="Icons/carret-left">
					<path id="Vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M14.9527 6.55418C15.2066 6.80802 15.2066 7.21958 14.9527 7.47342L10.4262 12L14.9527 16.5265C15.2066 16.7804 15.2066 17.1919 14.9527 17.4458C14.6989 17.6996 14.2873 17.6996 14.0335 17.4458L9.04731 12.4596C8.79347 12.2058 8.79347 11.7942 9.04731 11.5404L14.0335 6.55418C14.2873 6.30034 14.6989 6.30034 14.9527 6.55418Z" fill="#1D1416"/>
				</g>
			</svg>
			</button>
			<div class="swiper-pagination"></div>
			<button class="swiper-button-next" aria-label="<?php echo esc_attr__( 'Next slide', 'fourofthem' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M9.04727 17.4458C8.79343 17.1919 8.79343 16.7804 9.04727 16.5265L13.5738 12L9.04727 7.47344C8.79343 7.2196 8.79343 6.80804 9.04727 6.5542C9.30111 6.30036 9.71267 6.30036 9.96651 6.5542L14.9527 11.5404C15.2065 11.7942 15.2065 12.2058 14.9527 12.4596L9.96651 17.4458C9.71267 17.6996 9.30111 17.6996 9.04727 17.4458Z" fill="#1D1416"/>
				</svg>
			</button>
		</div>
	</section>
<?php endif; ?>
