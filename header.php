<?php // Full site head and opening body/page markup ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page-container">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'volatyl' ); ?></a>
		<?php get_template_part( 'template-parts/site', 'header' ); ?>