<?php // The main site header

// get args passed to site-header through the header template
if ( ! isset( $args ) ) {
	$args = array(
			'is_dark' => false,
	);
}

$is_dark = isset( $args['is_dark'] ) && $args['is_dark'];
$light_logo_atts = array();
if ( $is_dark ) {
	$light_logo_atts = wp_get_attachment_image_src( get_theme_mod( 'volatyl_front_page_hero_light_logo' ) );
}
?>

<header id="masthead" class="<?php echo $is_dark ? 'v-dark-background' : 'v-gray-background'; ?>">
	<div class="site-header">
		<div class="inner v-padding-y-3">
			<div class="site-header-elements">
				<div class="site-branding">
					<?php
					$home_url  = esc_url( home_url( '/' ) );
					$blog_name = get_bloginfo( 'name' );
					if ( $is_dark && ! empty( $light_logo_atts[0] ) ) {
						?>
						<a href="<?php echo $home_url; ?>" class="custom-logo-link" rel="home"><img src="<?php echo $light_logo_atts[0]; ?>" class="custom-logo"></a>
						<?php
					} else {
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							echo '<p class="site-title v-margin-0"><a href="' . $home_url . '" rel="home">' . $blog_name . '</a></p>';
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
</header>
