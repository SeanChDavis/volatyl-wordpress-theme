<?php // The main site header
$front_page_hero_dark = is_front_page() && get_theme_mod( 'volatyl_front_page_hero_dark', 0 );
$header_bg_color      = 'v-gray-background';
if ( $front_page_hero_dark ) {
	$header_bg_color = 'v-dark-background';
	$light_logo_atts = wp_get_attachment_image_src( get_theme_mod( 'volatyl_front_page_hero_light_logo' ) );
}
?>

<header id="masthead" class="<?php echo $header_bg_color; ?>">
	<div class="site-header">
		<div class="inner v-padding-y-4">
			<div class="site-header-elements">
				<div class="site-branding">
					<?php
					$home_url = esc_url( home_url( '/' ) );
					$blog_name = get_bloginfo( 'name' );
					if ( $front_page_hero_dark && ! empty( $light_logo_atts[0] ) ) {
						?>
						<a href="<?php echo $home_url; ?>" class="custom-logo-link" rel="home"><img src="<?php echo $light_logo_atts[0]; ?>" class="custom-logo" alt="<?php echo $blog_name; ?>"></a>
						<?php
					} else {
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							$title_classes = 'site-title v-margin-0';
							echo is_front_page() ? '<p class="' . $title_classes . '">' : '<h1 class="' . $title_classes . '">';
							echo '<a href="' . $home_url . '" rel="home">' . $blog_name . '</a>';
							echo is_front_page() ? '</p>' : '</h1>';
						}
					}
				?>
			</div>
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) {
				get_template_part( 'template-parts/site', 'navigation' );
			}
			?>
		</div>
	</div>
	</div>
	<?php get_template_part( 'template-parts/site', 'hero' ); ?>
</header>
