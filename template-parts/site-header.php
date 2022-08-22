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
					if ( $front_page_hero_dark && ! empty( $light_logo_atts[0] ) ) {
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"  class="custom-logo-link" rel="home"><img src="<?php echo $light_logo_atts[0]; ?>" class="custom-logo" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
						<?php
					} else {
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							$title_tag = is_front_page() ? 'p' : 'h1';
							?>
							<<?php echo $title_tag ?> class="site-title v-margin-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description', 'display' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $title_tag ?>>
							<?php
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
