<header class="header">
<div class="container">
		<div class="header__inner">
			<a class="header__logo logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/src/img/logo-300x96.png' ); ?>" alt="logo-image" >
			</a>
			<?php if ( has_nav_menu( 'main_navigation' ) ) : ?>
				<nav class="header__navigation navigation navigation--main">
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
				<div class="js-toggle toggle">
					<span class="toggle-inner toggle-inner--open">
						<?php esc_html_e( 'Menu', 'fourofthem' ); ?>
					</span>
					<span class="toggle-inner toggle-inner--close">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M4.95928 17.9393C4.66639 18.2322 4.66639 18.7071 4.95928 19C5.25218 19.2929 5.72705 19.2929 6.01995 19L11.929 13.091L17.9801 19.1421C18.273 19.435 18.7479 19.435 19.0408 19.1421C19.3337 18.8492 19.3337 18.3744 19.0408 18.0815L12.9896 12.0303L19.1014 5.91851C19.3943 5.62562 19.3943 5.15075 19.1014 4.85785C18.8085 4.56496 18.3337 4.56496 18.0408 4.85785L11.929 10.9697L5.95928 4.99999C5.66639 4.7071 5.19152 4.7071 4.89862 4.99999C4.60573 5.29288 4.60573 5.76776 4.89863 6.06065L10.8683 12.0303L4.95928 17.9393Z" fill="#1D1416"/>
						</svg>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>
