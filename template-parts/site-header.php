<?php // The main site header

$args    = wp_parse_args( $args ?? array(), array( 'is_dark' => false ) );
$is_dark = (bool) $args['is_dark'];

$light_logo_atts = array();
if ( $is_dark ) {
	$light_logo_atts = wp_get_attachment_image_src( get_theme_mod( 'volatyl_light_logo' ) );
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
						<a href="<?php echo $home_url; ?>" class="custom-logo-link" rel="home"><img src="<?php echo esc_url( $light_logo_atts[0] ); ?>" class="custom-logo" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
						<?php
					} else {
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							echo '<p class="site-title v-margin-0"><a href="' . $home_url . '" rel="home">' . esc_html( $blog_name ) . '</a></p>';
						}
					}
					?>
				</div>
				<?php
				if ( has_nav_menu( 'primary-menu' ) ) {
					get_template_part( 'template-parts/site', 'navigation' );
				}
				if ( get_theme_mod( 'volatyl_header_search', 0 ) ) {
					?>
					<button class="search-toggle" aria-expanded="false" aria-controls="search-overlay" aria-label="<?php esc_attr_e( 'Open search', 'volatyl' ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
					</button>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</header>
<?php if ( get_theme_mod( 'volatyl_header_search', 0 ) ) {
	get_template_part( 'template-parts/search', 'overlay' );
}
