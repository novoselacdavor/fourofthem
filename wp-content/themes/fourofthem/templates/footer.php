<footer class="footer">
	<div class="container">
		<div class="footer__inner">
			<a class="footer__logo logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/src/img/logo-300x96.png' ); ?>" alt="logo-image" >
			</a>
			<?php if ( has_nav_menu( 'main_navigation' ) ) : ?>
				<nav class="footer__navigation navigation navigation--main">
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'main_navigation',
							'container'      => false,
							'menu_class'     => 'navigation__menu navigation__menu--main',
							'menu_id'        => 'main-navigation-menu',
						]
					);
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</footer>
