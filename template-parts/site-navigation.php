<?php
/**
 * The main site navigation used in the header
 */
?>

<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'volatyl' ); ?></button>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary-menu',
			'menu_id'        => 'primary-menu'
		)
	);
	?>
</nav>