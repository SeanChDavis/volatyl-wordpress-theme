<?php // The main site header

    = wp_parse_args(  ?? array(), array( 'is_dark' => false ) );
 = (bool) ['is_dark'];

 = array();
if (  ) {
	 = wp_get_attachment_image_src( get_theme_mod( 'volatyl_light_logo' ) );
}
?>

<header id="masthead" class="<?php echo  ? 'v-dark-background' : 'v-gray-background'; ?>">
	<div class="site-header">
		<div class="inner v-padding-y-3">
			<div class="site-header-elements">
				<div class="site-branding">
					<?php
					  = esc_url( home_url( '/' ) );
					 = get_bloginfo( 'name' );
					if (  && ! empty( [0] ) ) {
						?>
						<a href="<?php echo ; ?>" class="custom-logo-link" rel="home"><img src="<?php echo esc_url( [0] ); ?>" class="custom-logo" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
						<?php
					} else {
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							echo '<p class="site-title v-margin-0"><a href="' .  . '" rel="home">' . esc_html(  ) . '</a></p>';
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
