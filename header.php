<?php
/**
 * Full site head and opening body tag
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

		<header class="site-header">
			<div class="inner">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description', 'display' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
				<nav id="site-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_s' ); ?></button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
			</div>
		</header>